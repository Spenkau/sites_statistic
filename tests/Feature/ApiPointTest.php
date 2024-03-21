<?php

namespace Tests\Feature;

use App\Models\ApiPoint;
use App\Models\User;
use App\Services\ApiPointService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ApiPointTest extends TestCase
{
    public ApiPointService $apiPointService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->apiPointService = app(ApiPointService::class);

    }

    public function test_api_points_can_retrieved()
    {
        $apis = ($this->apiPointService->all());

        $this->assertIsObject($apis, 'Failed to fetch data from DB');
    }

    public function test_user_can_get_api_job_result()
    {
        $user = User::first();

        $response = $this->actingAs($user)
            ->followingRedirects()
            ->withoutMiddleware()
            ->get('api-point');

        $response->assertOk();

        $response->assertViewHas('apiPoints', function ($apiPoints) {
            return $apiPoints->each(function ($apiPoint) {
                return empty($apiPoint['name']);
            })->contains(true);
        });
    }

    public function test_user_can_get_api_history()
    {
        $user = User::first();

        $apiPoint = ApiPoint::first();

        $response = $this->actingAs($user)
            ->followingRedirects()
            ->withoutMiddleware()
            ->get('api-point/' . $apiPoint->id);

        $response->assertOk();

        $response->assertViewHas('apiPoint', function ($apiPoint) {
            return !empty($apiPoint->api_history);
        });
    }

    public function test_api_details_can_stored_into_table()
    {
        $exitCode = Artisan::call('update:api-point-details');

        $this->assertEquals(0, $exitCode);

        $output = Artisan::output();

        $this->assertStringContainsString('API points details stored successfully', $output);

    }
}
