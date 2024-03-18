<?php

namespace App\Services;

use App\Enums\NotificationEnum;
use App\Models\Page;
use App\Repositories\DetailRepository;
use App\Repositories\UserRepository;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;

class DetailService
{
    protected DetailRepository $detailRepository;

    public function __construct(DetailRepository $detailRepository)
    {
        $this->detailRepository = $detailRepository;
    }

    public function all()
    {
        return Page::query()->get();
    }

    public function store($data)
    {
        $request = $this->validateDetail($data);

        if ($request->fails()) {
            $data['error'] = $request->errors();

            return null;
        } else {
            $detail = $request->validated();

            return $this->detailRepository->store($detail);
        }
    }

    public function updateDetails($page)
    {
        $data = [];

        try {
            $response = Http::get($page->url);

            $data['response_time'] = $response->transferStats->getTransferTime();
            $data['status_code'] = $response->status();
            $data['page_id'] = $page->id;

            $response->throw();
        } catch (\Throwable $exception) {
            $data['error'] = $exception->getMessage();
        } finally {
            $this->store($data);
        }
    }

    public function validateDetail(array $data): Validator
    {
        return ValidatorFacade::make($data, [
            'page_id' => 'required|numeric',
            'status_code' => 'required|numeric',
            'response_time' => 'required|numeric',
            'error' => 'nullable'
        ]);
    }
}
