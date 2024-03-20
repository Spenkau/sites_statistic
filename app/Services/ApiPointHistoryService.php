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

class ApiPointHistoryService
{
    protected ApiPointHistoryRepository $apiPointHistoryRepository;

    public function __construct(ApiPointHistoryRepository $apiPointHistoryRepository)
    {
        $this->apiPointHistoryRepository = $apiPointHistoryRepository;
    }

    public function all()
    {
        return $this->apiPointHistoryRepository->all();
    }

    public function store($data)
    {
        $request = $this->validateApiPointHistory($data);

        if ($request->fails()) {
            return null;
        } else {
            $detail = $request->validated();

            return $this->apiPointHistoryRepository->store($detail);
        }
    }

    public function update($apiPointId, $response)
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
