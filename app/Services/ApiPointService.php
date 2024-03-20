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

    public function show(int $id)
    {
        return $this->apiPointRepository->show($id);
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


    public function update(array $service, string $serviceName, array $headers, string $url)
    {
        $method = $service['method'] ?? 'GET';
        $serviceUrl = $url . $serviceName;
        $params = $service['parameters'] ?? null;

        $response = null;
        if ($method == 'GET') {
            $response = Http::withHeaders($headers)
                ->get($serviceUrl, $params);
        } else if ($method == 'POST') {
            $response = Http::withHeaders($headers)
                ->post($serviceUrl, $params);
        }

        $data = [
            'name' => $url,
            'url' => $serviceUrl,
            'request_data' => json_encode($params),
            'response_data' => $response->body(),
            'service' => $serviceName ?? "NONE"
        ];

        try {
            $newApiPoint = $this->store($data);

            if (!empty($newApiPoint)) {
                $this->apiPointHistoryService->update($newApiPoint->id, $response);
            }
        } catch (Exception $exception) {
            throw new Exception($exception);
        }
    }

    public function validate(array $data): Validator
    {
        return ValidatorFacade::make($data, [
            'name' => 'nullable|string',
            'url' => 'nullable|string',
            'request_data' => 'nullable|string',
            'response_data' => 'nullable|string',
            'service' => 'nullable|string',
            'error' => 'nullable|boolean',
            'code' => 'nullable|numeric'
        ]);
    }
}
