<?php

namespace App\Jobs;

use App\Enums\ApiServiceEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class UpdateApiPointDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $services;

    private array $headers;

    private string $url = 'https://preprod-vpdrk.hellishworld.ru/api/v2/';

    private int $user_id;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->services = Config::get('api_services');

        $this->authenticateSession();
    }

    public function authenticateSession(): void
    {
        $response = Http::get($this->url . 'login', [
            'email' => env('API_ACCOUNT_EMAIL'),
            'password' => env('API_ACCOUNT_PASSWORD')
        ]);

        $bearerToken = $response['token'];

        $this->headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken
        ];

        $this->user_id = Auth::id();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $serviceNames = array_column(ApiServiceEnum::cases(), 'value');

        $data = [];

        foreach ($serviceNames as $serviceName) {
            $service = $this->services[$serviceName];

            $method = $service['method'] ?? 'GET';
            $headers = $this->headers;
            $url = $this->url . $serviceName;
            $params = $service['parameters'] ?? null;

            $response = null;
            if ($method == 'GET') {
                $response = Http::withHeaders($headers)
                    ->get($url, $params);
            } else if ($method == 'POST') {
                $response = Http::withHeaders($headers)
                    ->post($url, $params);
            }

            $data[] = [
                'name' => fake()->colorName,
                'url' => $url,
                'user_id' => $this->user_id,
                'request_data' => json_encode($params),
                'response_data' => $response->body()
            ];

            $details = [
                'api_point' => 1,
                'status_code' => $response->status(),
                'response_time' => $response->transferStats->getTransferTime()
            ];
        }
    }
}
