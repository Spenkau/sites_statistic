<?php

namespace App\Services;

use App\Repositories\ApiPointHistoryRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;

class ApiPointHistoryService
{
    protected ApiPointHistoryRepository $apiPointHistoryRepository;

    public function __construct(ApiPointHistoryRepository $apiPointHistoryRepository)
    {
        $this->apiPointHistoryRepository = $apiPointHistoryRepository;
    }

    public function all(): JsonResource
    {
        return $this->apiPointHistoryRepository->all();
    }

    public function store($data): ?JsonResource
    {
        $request = $this->validateApiPointHistory($data);

        if ($request->fails()) {
            return null;
        } else {
            $detail = $request->validated();

            return $this->apiPointHistoryRepository->store($detail);
        }
    }

    public function update($apiPointId, $response): void
    {
        $details = [
            'api_point_id' => $apiPointId,
            'status_code' => $response->status(),
            'response_time' => $response->transferStats->getTransferTime()
        ];

        $this->store($details);
    }

    public function validateApiPointHistory(array $data): Validator
    {
        return ValidatorFacade::make($data, [
            'api_point_id' => 'required|numeric',
            'status_code' => 'nullable|numeric',
            'response_time' => 'nullable|numeric',
        ]);
    }
}
