<?php

namespace App\Services;

use App\Enums\NotificationEnum;
use App\Models\Page;
use App\Repositories\DetailRepository;
use App\Repositories\UserRepository;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\TransferStats;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
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

    public function store($data): ?JsonResource
    {
        return $this->detailRepository->store($data);
    }

    public function updateDetails($page)
    {
        $data = [];
        $data['page_id'] = $page->id;

        try {
            Http::retry(3, 100, function ($exception) {
                return $exception instanceof ConnectException;
            })
                ->get($page->url)
                ->throw(function ($response, $e) use (&$data) {
                    $data['status_code'] = $response->status();
                    $data['response_time'] = $response->transferStats->getTransferTime();
                    $data['error'] = $e->getMessage();
                });
        } catch (\GuzzleHttp\Exception\RequestException $exception) {
            $data['status_code'] = 500;
            $data['error'] = $exception->getMessage();
        }

        return $data;
//        try {
//            $response = Http::get($page->url);
//
//            $data['response_time'] = $response->transferStats->getTransferTime();
//            $data['status_code'] = $response->status();
//
//            $response->throw();
//        } catch (\Throwable $exception) {
//            $data['error'] = $exception->getMessage();
//        } finally {
//            return $data;
//        }
    }

//    public function validateDetail(array $data): Validator
//    {
//        return ValidatorFacade::make($data, [
//            'page_id' => 'required|numeric',
//            'status_code' => 'required|numeric',
//            'response_time' => 'required|numeric',
//            'error' => 'nullable'
//        ]);
//    }
}
// TODO дочинить это
