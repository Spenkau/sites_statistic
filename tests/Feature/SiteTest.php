<?php

namespace Tests\Feature;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class SiteTest extends TestCase
{
    public Model $user;


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
    }

    /**
     * A basic feature test example.
     */
    public function test_dashboard_page_is_displayed(): void
    {
        $user = $this->user;

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertOk();
    }

    public function test_user_sites_can_be_rendered(): void
    {

        $user = $this->user;

        $sites = Site::factory(10)->create();


        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);

        $response->assertViewHas('sites', function ($sites) use ($user) {
            return !$sites->each(function ($site) use ($user) {
                return $site->user_id === $user->id;
            })->contains(false);
        });
    }

    public function test_user_can_visit_create_new_site_page()
    {
        $user = $this->user;

        $response = $this->actingAs($user)->get('/site/create');

        $response->assertOk();
    }

    public function test_user_can_store_new_site()
    {
        $user = $this->user;

        $this->actingAs($user);

        $currentAmountOfRecords = Site::where('user_id', $user->id)->count();

        $response = $this->withoutMiddleware()->post('/site', [
            'name' => 'Test name',
            'url' => 'Test url',
            'user_id' => $user->id,
            'comment' => 'Test comment'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('sites', [
            'name' => 'Test name',
            'url' => 'Test url',
            'user_id' => $user->id,
            'comment' => 'Test comment'
        ]);

        $this->assertDatabaseCount('sites', ++$currentAmountOfRecords);
    }

    public function test_user_can_visit_edit_site_page()
    {
        $user = $this->user;

        $response = $this->actingAs($user)->get('/site/edit');

        $response->assertOk();
    }

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

        $response = $this->withoutMiddleware()->put('/site/' . $site->id, [
            'name' => 'New test name',
            'url' => 'New test url',
            'user_id' => $user->id,
            'comment' => 'New test comment'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('sites', [
            'name' => 'New test name',
            'url' => 'New test url',
            'user_id' => $user->id,
            'comment' => 'New test comment'
        ]);

        $this->assertDatabaseCount('sites', $currentAmountOfRecords);
    }

    public function test_user_can_delete_site()
    {
        $user = $this->user;

        $this->actingAs($user);

        $site = Site::where('user_id', $user->id)->latest()->first();

        $response = $this->delete('/site/' . $site->id);

        !$this->assertDatabaseHas('sites', ['name' => $site->name]);

        $response->assertOk();
    }
}
