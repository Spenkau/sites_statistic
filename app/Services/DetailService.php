<?php

namespace App\Services;

use App\Models\Page;
use App\Repositories\DetailRepository;
use App\Repositories\PageRepository;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

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

//        try {
//            $response = Http::retry(3, 100, function ($exception) {
//                return $exception instanceof ConnectException;
//            })
//                ->get($page->url);
//
//            if ($response->successful()) {
//                $data['status_code']= $response->status();
//                $data['response_time'] = $response->transferStats->getTransferTime();
//            } else {
//                $response->onError(function ($error) use (&$data) {
//                    $data['error'] = $error;
//                    $data['status_code'] = $error->getStatusCode();
//                });
//            }
//        } catch (\Throwable $exception) {
//            $data['response_time'] ?? $data['response_time'] = 0;
//            $data['status_code'] ?? $data['status_code'] = 0;
//            $data['error'] = $exception->getMessage();
//        }
//
//        return $data;
        try {
            $response = Http::get($page->url);

            $data['response_time'] = $response->transferStats->getTransferTime();
            $data['status_code'] = $response->status();

            $response->throw();
        } catch (\Throwable $exception) {
            $data['response_time'] ?? $data['response_time'] = 0;
            $data['status_code'] ?? $data['status_code'] = 0;

            $data['error'] = $exception->getMessage();
        }

        $this->store($data);
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
