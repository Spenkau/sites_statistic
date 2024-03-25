<?php

namespace App\Services;

use App\Repositories\ApiPointRepository;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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

    public function all(): JsonResource
    {
        return $this->apiPointRepository->all();
    }

    public function show(int $id): JsonResource
    {
        return $this->apiPointRepository->show($id);
    }

    public function store($data): ?JsonResource
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
        $serviceUrl = $url . $service['uri'];

        $options = [
            'headers' => $headers
        ];

        if ($method == "GET" && !empty($service['query_params'])) {
            $options['query'] = $service['query_params'];
        } else if ((
                $method == "POST" ||
                $method == "PUT" ||
                $method == "PATCH") && !empty($service['form_params'])) {
            $options['form_params'] = $service['form_params'];
        }

        if (!empty($service['path_params'])) {
            $options['path_params'] = $service['path_params'];
        }

        $response_data = null;
        try {
            $response = Http::withUrlParameters($service['path_params'] ?? [])->send($method, $serviceUrl, $options);

            $response_data = $response->body();
        } catch (Exception $exception) {
            $response_data = $exception->getMessage();
        } finally {
            $data = [
                'name' => $url,
                'url' => $serviceUrl,
                'request_data' => json_encode($options),
                'response_data' => $response_data,
                'service' => $serviceName
            ];
        }

        $newApiPoint = $this->store($data);

        if (!empty($newApiPoint)) {
            $this->apiPointHistoryService->update($newApiPoint->id, $response);
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
