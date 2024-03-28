<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\Site;
use App\Models\User;
use Database\Factories\SiteFactory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class PageTest extends TestCase
{
    public User $user;
    public User $collaborator;

    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();

        // clear database after all tests
        Artisan::call('migrate:refresh');
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::firstOrCreate([
            'name' => 'test',
            'email' => 'test@example.com',
        ], [
            'name' => 'test',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'remember_token' => Str::random(10),
        ]);

        User::firstOrCreate([
            'name' => 'test2',
            'email' => 'test2@example.com',
        ], [
            'name' => 'test2',
            'email' => 'test2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'remember_token' => Str::random(10),
        ]);

        User::firstOrCreate([
            'name' => 'test3',
            'email' => 'test3@example.com',
        ], [
            'name' => 'test3',
            'email' => 'test3@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'remember_token' => Str::random(10),
        ]);

        Site::factory(10)->create();
    }

    /**
     * @test
     */
    public function test_site_with_pages_is_displayed(): void
    {
        $user = $this->user;

        $site = $user->personal_sites()->first();

        $response = $this->followingRedirects()
            ->actingAs($user)
            ->get('/site' . $site->id);

        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_page_is_displayed(): void
    {
        $user = $this->user;

        $site = $user->personal_sites()->first();

        Page::create([
            'url' => fake()->url,
            'threshold_speed' => fake()->numberBetween(200, 10000),
            'site_id' => $site->id,
            'comment' => fake()->text
        ]);

        $page = $site->pages()->first();

        $response = $this->followingRedirects()
            ->actingAs($user)
            ->get('/site' . $site->id . '/page/' . $page->id);

        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_user_site_with_pages_can_be_rendered(): void
    {

        $user = $this->user;

        $site = $user->personal_sites()->first();

        $response = $this->followingRedirects()->actingAs($user)->get('/site' . $site->id);

        $response->assertOk();

        $response->assertViewHas('sites', function ($sites) use ($site) {
            return !empty($sites) && !$site->pages->each(function ($page) use ($site) {
                    return $page->user_id === $site->id;
                })->contains(false);
        });
    }

    /**
     * @test
     */
    public function test_user_can_visit_create_new_page()
    {
        $user = $this->user;

        $site = $user->personal_sites()->first();

        $response = $this->actingAs($user)->get('/site/' . $site->id . '/page/create');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_user_can_store_new_page()
    {
        $user = $this->user;

        $this->actingAs($user);

        $site = $user->personal_sites()->first();

        $currentAmountOfRecords = Page::count();

        $url = fake()->url;
        $response = $this->followingRedirects()->withoutMiddleware()->post('/site/' . $site->id . '/page', [
            'url' => $url,
            'threshold_speed' => 600,
            'site_id' => $site->id,
            'comment' => 'Test comment for page'
        ]);

        $response->assertOk();

        $this->assertDatabaseHas('pages', [
            'url' => $url,
            'site_id' => $site->id,
            'comment' => 'Test comment for page'
        ]);

        $this->assertDatabaseCount('pages', ++$currentAmountOfRecords);
    }

    /**
     * @test
     */
    public function test_user_can_visit_edit_page()
    {
        $user = $this->user;

        $site = $user->personal_sites()->first();

        $page = $site->pages()->first();

        $response = $this->actingAs($user)
            ->get('/site/' . $site->id . '/page/' . $page->id . '/edit');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_user_can_edit_page()
    {
        $user = $this->user;

        $site = $user->personal_sites()->first();

        $currentAmountOfRecords = Page::count();

        $this->actingAs($user);

        $url = fake()->url;
        $response = $this->followingRedirects()
            ->withoutMiddleware()
            ->post(
                '/site/' . $site->id . '/page',
                [
                    'url' => $url,
                    'threshold_speed' => 600,
                    'site_id' => $site->id,
                    'comment' => 'Test comment for page'
                ]
            );

        $response->assertOk();

        $this->assertDatabaseCount('pages', ++$currentAmountOfRecords);

        $newPage = Page::where('url', $url)->first();

        $newUrl = fake()->url;
        $response = $this->followingRedirects()
            ->withoutMiddleware()
            ->put(
                '/site/' . $site->id . '/page/' . $newPage->id,
                [
                    'url' => $newUrl,
                    'threshold_speed' => 800,
                    'site_id' => $site->id,
                    'comment' => 'New test comment'
                ]
            );

        $response->assertOk();

        $this->assertDatabaseHas('pages', [
            'url' => $newUrl,
            'threshold_speed' => 800,
            'site_id' => $site->id,
            'comment' => 'New test comment'
        ]);

    }

    /**
     * @test
     */
    public function test_user_can_delete_site()
    {
        $currentAmountOfRecords = Page::count();

        $user = $this->user;

        $site = $user->personal_sites()->first();

        $page = $site->pages()->latest()->first();

        $this->actingAs($user);

        $response = $this->followingRedirects()
            ->withoutMiddleware()
            ->delete('/site/' . $site->id . '/page/' . $page->id);

        $response->assertOk();

        $this->assertDatabaseCount('pages', --$currentAmountOfRecords);
    }
}
