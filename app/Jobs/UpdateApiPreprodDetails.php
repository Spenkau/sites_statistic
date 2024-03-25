<?php

namespace App\Jobs;

use App\Enums\ApiPreprodServiceEnum;
use App\Services\ApiPointService;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class UpdateApiPreprodDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const API_PREPROD_V1_URL = 'https://preprod-vpdrk.hellishworld.ru/api/v1/';
    const API_PREPROD_V2_URL = 'https://preprod-vpdrk.hellishworld.ru/api/v2/';
    const API_PREPROD_V3_URL = 'https://preprod-vpdrk.hellishworld.ru/api/v3/';

    public ApiPointService $apiPointService;

    private mixed $services;

    private array $headers;

    /**
     * Create a new job instance.
     */
    public function __construct(ApiPointService $apiPointService)
    {
        $this->apiPointService = $apiPointService;

        $this->services = Config::get('api_preprod_v2_services');
    }

    public function authenticateSession(): void
    {
        $response = Http::get(static::API_PREPROD_V2_URL. 'login', [
            'email' => env('API_PREPROD_ACCOUNT_EMAIL', 'danyat@test.ru'),
            'password' => env('API_PREPROD_ACCOUNT_PASSWORD', 'test')
        ]);

        $bearerToken = $response['token'];

        $this->headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken
        ];

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->authenticateSession();

        $serviceNames = array_column(ApiPreprodServiceEnum::cases(), 'value');

        foreach ($serviceNames as $serviceName) {
            $service = $this->services[$serviceName];

            if (empty($service['method'])) {
                foreach ($service as $subService) {
                    $this->apiPointService->update($subService, $serviceName, $this->headers, static::API_PREPROD_V2_URL);
                }
            } else {
                $this->apiPointService->update($service, $serviceName, $this->headers, static::API_PREPROD_V2_URL);
            }
        }
    }
}
