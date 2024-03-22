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

    public ApiPointService $apiPointService;

    private mixed $services;

    private array $headers;

    /**
     * Create a new job instance.
     */
    public function __construct(ApiPointService $apiPointService)
    {
        $this->apiPointService = $apiPointService;

        $this->services = Config::get('api_v2_services');
    }

    public function authenticateSession(): void
    {
        $this->headers = [
            'Accept' => 'application/json',
            'email' => env('API_PROCESSING_ACCOUNT_EMAIL', 'admin@admin.com'),
            'password' => env('API_PROCESSING_ACCOUNT_PASSWORD', 'admin')
        ];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->authenticateSession();

        $serviceNames = array_column(ApiProcessingServiceEnum::cases(), 'value');

//        foreach () {
//
//        }
    }
}
