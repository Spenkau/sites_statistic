<?php

namespace App\Jobs;

use App\Enums\ApiServiceEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class UpdateApiPointDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $services;

    private array $headers;

    private string $url = 'https://preprod-vpdrk.hellishworld.ru/';
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->services = Config::get('api_services')['services'];

        $this->authenticateSession();
    }

    public function authenticateSession(): void
    {
        $response = Http::get('login', [
            'email' => 'danyat@test.ru',
            'password' => 'test'
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
        $serviceNames = array_column(ApiServiceEnum::cases(), 'value');

        foreach ($serviceNames as $serviceName) {
            $service = $this->services[$serviceName];

            $method = $service['method'];
            $headers = $this->headers;
            $url = $this->url . $serviceName;
            $params = $service['parameters'];

            Http::withHeaders($headers)
                ->{$method}($url, $params);
        }
    }
}
