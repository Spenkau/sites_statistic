<?php

namespace Tests\Feature;

use App\Models\Site;
use App\Models\User;
use App\Repositories\SiteRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class SiteTest extends TestCase
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

    public function test_filters()
    {
        $stringFields = ['name', 'title', 'url', 'comment', 'request_data', 'response_data'];


        $res = in_array('name', $stringFields);
        dump($res);
    }

    /**
     * @test
     */
    public function test_dashboard_page_is_displayed(): void
    {
        $user = $this->user;

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_user_sites_can_be_rendered(): void
    {

        $user = $this->user;

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);

        $response->assertViewHas('sites', function ($sites) use ($user) {
            return !$sites->each(function ($site) use ($user) {
                return $site->user_id === $user->id;
            })->contains(false);
        });
    }

    /**
     * @test
     */
    public function test_user_can_visit_create_new_site_page()
    {
        $user = $this->user;

        $response = $this->actingAs($user)->get('/site/create');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_user_can_store_new_site()
    {
        $user = $this->user;

        $this->actingAs($user);

        $currentAmountOfRecords = Site::where('user_id', $user->id)->count();

        $url = fake()->url;
        $response = $this->withoutMiddleware()->post('/site', [
            'name' => 'Test name',
            'url' => $url,
            'user_id' => $user->id,
            'comment' => 'Test comment'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('sites', [
            'name' => 'Test name',
            'url' => $url,
            'user_id' => $user->id,
            'comment' => 'Test comment'
        ]);

        $this->assertDatabaseCount('sites', ++$currentAmountOfRecords);
    }

    /**
     * @test
     */
    public function test_user_can_visit_edit_site_page()
    {
        $user = $this->user;

        $site = Site::where('user_id', $user->id)->latest()->first();

        $response = $this->actingAs($user)->get('/site/' . $site->id . '/edit');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_user_can_edit_site()
    {
        $user = $this->user;

        $this->actingAs($user);

        $newSite = $this->withoutMiddleware()->post('/site', [
            'name' => 'Test name',
            'url' => fake()->url,
            'user_id' => $user->id,
            'comment' => 'Test comment'
        ]);

        $site = Site::where('user_id', $user->id)->latest()->first();

        $currentAmountOfRecords = Site::where('user_id', $user->id)->count();

        $uniqueUrl = fake()->url;

        $response = $this->withoutMiddleware()->put('/site/' . $site->id, [
            'name' => 'New test name',
            'url' => $uniqueUrl,
            'user_id' => $user->id,
            'comment' => 'New test comment'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('sites', [
            'name' => 'New test name',
            'url' => $uniqueUrl,
            'user_id' => $user->id,
            'comment' => 'New test comment'
        ]);

        $this->assertDatabaseCount('sites', $currentAmountOfRecords);
    }

    /**
     * @test
     */
    public function test_user_can_delete_site()
    {
        $user = $this->user;

        $this->actingAs($user);

        $site = Site::where('user_id', $user->id)->latest()->first();

        $response = $this->withoutMiddleware()->delete('/site/' . $site->id);

        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_user_can_visit_add_user_page()
    {
        $user = $this->user;

        $site = $user->personal_sites()->latest()->first();

        $response = $this->actingAs($user)->get('/site/' . $site->id . '/add-user');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function test_user_can_add_user_to_own_site()
    {
        $owner = $this->user;

        $collaborators = User::where('id', '!=', $owner->id)->take(2)->pluck('id');

        $site = $owner->personal_sites()->first();
        $response = $this->withoutMiddleware()
            ->actingAs($owner)
            ->post(
                '/site/' . $site->id . '/store-user',
                [
                    'site_id' => $site->id,
                    'user_ids' => $collaborators->toArray()
                ]
            );
        $response->assertOk();
    }

    public function test_user_can_visit_public_sites()
    {
        $owner = $this->user;

        $collaborator = User::where('id', '!=', $owner->id)->first();

        $response = $this->actingAs($collaborator)->get('/site/party');

        $response->assertStatus(200);
    }

    public function test_public_user_can_edit_site()
    {
        $owner = $this->user;

        $collaborator = User::where('id', '!=', $owner->id)->first();

        $site = $owner->personal_sites()->first();

        $response = $this->actingAs($owner)->withoutMiddleware()->post('/site/' . $site->id . '/store-user', [
            'site_id' => $site->id,
            'user_ids' => [$collaborator->id]
        ]);

        $response->assertOk();

        $secondResponse = $this->actingAs($collaborator)->withoutMiddleware()->put('/site/' . $site->id, [
            'name' => 'New test name',
            'url' => fake()->url,
            'user_id' => $owner->id,
            'comment' => 'New test comment'
        ]);

        $secondResponse->assertStatus(302);
    }
}
