<?php

namespace App\Jobs;

use App\Enums\ApiProcessingServiceEnum;
use App\Services\ApiPointService;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class UpdateApiProcessingDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const API_PROCESSING_URL = 'https://processing.hellishworld.ru/api/';

    public array $authData = [];
    public ApiPointService $apiPointService;

    private mixed $services;

    private array $headers;

    /**
     * Create a new job instance.
     */
    public function __construct(ApiPointService $apiPointService)
    {
        $this->apiPointService = $apiPointService;

        $this->services = Config::get('api_processing_services');

        $this->authData = Config::get('auth_api_services')['processing'];
    }

    public function authenticateSession(): void
    {
        $this->headers = [
            'Accept' => 'application/json',
            'email' => $this->authData['email'],
            'password' => $this->authData['password']
        ];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->authenticateSession();

        $services = $this->services;
        $serviceNames = array_column(ApiProcessingServiceEnum::cases(), 'value');

        if (count($serviceNames) == count($services)) {

            foreach ($serviceNames as $serviceName) {

                for ($i = 0; $i < count($services[$serviceName]); $i++) {
                    $service = $services[$serviceName][$i];

                    $this->apiPointService->update($service, $serviceName, $this->headers, static::API_PROCESSING_URL);
                }
            }
        }
    }
}
