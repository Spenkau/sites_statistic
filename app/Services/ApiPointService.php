<?php

namespace App\Services;

use App\Enums\NotificationEnum;
use App\Models\ApiPoint;
use App\Models\Page;
use App\Repositories\ApiPointHistoryRepository;
use App\Repositories\ApiPointRepository;
use App\Repositories\DetailRepository;
use App\Repositories\UserRepository;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;

class ApiPointService
{
    protected ApiPointRepository $apiPointRepository;
    protected ApiPointHistoryService $apiPointHistoryService;

    public function __construct(ApiPointRepository $apiPointRepository, ApiPointHistoryService $apiPointHistoryService)
    {
        $this->apiPointRepository = $apiPointRepository;
        $this->apiPointHistoryService = $apiPointHistoryService;
    }

    public function all()
    {
        return $this->apiPointRepository->all();
    }

    public function store($data)
    {
        $request = $this->validate($data);

        if ($request->fails()) {
            return null;
        } else {
            $detail = $request->validated();

            return $this->apiPointRepository->store($detail);
        }
    }


    public function update(array $services)
    {
        $service = $services[$serviceName];

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

        $newApiPoint = $this->store($response);

        if (!empty($newApiPoint)) {
            $this->apiPointHistoryService->update($newApiPoint->id, $response);
        }
    }

    public function validate(array $data): Validator
    {
        return ValidatorFacade::make($data, [
            'name' => 'required|string',
            'url' => 'required|string',
            'user_id' => 'nullable|numeric',
            'request_data' => 'nullable|string',
            'response_data' => 'nullable|string'
        ]);
    }


}
