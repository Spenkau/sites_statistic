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
            return null;
        } else {
            $detail = $request->validated();

            return $this->detailRepository->store($detail);
        }
    }

    public function updateDetails($page)
    {
        $data = [];

        $client = new Client();

        $data['status_code'] = 0;
        try {
            $response = $client->request('GET', $page->url, [
                'on_stats' => function (TransferStats $stats) use (&$data) {
                    $data['response_time'] = $stats->getTransferTime();
                }
            ]);

            $data['status_code'] = $response->getStatusCode();
        } catch (\GuzzleHttp\Exception\RequestException $exception) {
            $data['status_code'] = $exception->hasResponse() ? $exception->getResponse()->getStatusCode() : 500;
            $data['error'] = $exception->hasResponse() ? $exception->getResponse()->getStatusCode() : 'No response';
        } catch (Exception $exception) {
            $data['status_code'] = $exception->getCode();
            $data['error'] = $exception->getMessage();
        } finally {
            $data['page_id'] = $page->id;

            $this->store($data);
        }
    }



    public function validateDetail(array $data): Validator
    {
        $data = [
            'page_id' => $data['page_id'],
            'status_code' => $data['status_code'],
            'response_time' => $data['response_time'],
            'error' => $data['error'] ?? null
        ];

        return ValidatorFacade::make($data, [
            'page_id' => 'required|numeric',
            'status_code' => 'required|numeric',
            'response_time' => 'required|numeric',
            'error' => ''
        ]);
    }
}
