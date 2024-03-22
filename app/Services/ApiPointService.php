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

    public function update(array $service, string $serviceName, array $headers, string $url): void
    {
        $method = $service['method'] ?? 'GET';
        $serviceUrl = $url . $serviceName;
        $params = $service['query_params'] ?? $service['form_params'];

        $options = [
            'headers' => $headers
        ];

        if ($method == "GET") {
            $options['query'] = $service['query_params'];
        } else if ($method == "DELETE") {
            $serviceUrl .= '/' . $params['id'];
        } else {
            $options['form_params'] = $service['form_params'];
        }

        $response = Http::withUrlParameters($service['path_params'] ?? [])->send($method, $serviceUrl, $options);

        $data = [
            'name' => $url,
            'url' => $serviceUrl,
            'request_data' => json_encode($params),
            'response_data' => $response->body(),
            'service' => $serviceName
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
