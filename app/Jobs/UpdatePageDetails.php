<?php

namespace App\Jobs;

use App\Models\Page;
use App\Repositories\DetailRepository;
use App\Repositories\Interfaces\DetailRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;

class UpdatePageDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public DetailRepositoryInterface $detailRepository;

    public float $responseTime;

    public int $statusCode;

    /**
     * Create a new job instance.
     */
    public function __construct(DetailRepositoryInterface $detailRepository)
    {
        $this->detailRepository = $detailRepository;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pages = Page::query()->get();

        foreach ($pages as $page) {

            try {
                $client = new Client();

                $response = $client->request('GET', 'https://vpodarok.ru', [
                    'on_stats' => function (TransferStats $stats) {
                        $this->responseTime = $stats->getTransferTime();
                    }
                ]);

                $this->statusCode = $response->getStatusCode();

                $this->storeDetail($page);
            } catch (\Exception $exception) {
                $this->storeDetail($page, $exception);
            }
        }
    }

    public function storeDetail(Page $page, string $error = null): void
    {
        $detail = [];

        if (!empty($error)) {
            $detail['error'] = $error;
        }

        $validDetails = $this->validateDetail($page);

        if ($validDetails->fails()) {
            return;
        } else {
            $detail = $validDetails->validated();

            $this->detailRepository->storeJobResult($detail);
        }
    }

    public function validateDetail(Page $page): Validator
    {
        $data = [
            'page_id' => $page->id,
            'status_code' => $this->statusCode,
            'response_time' => $this->responseTime
        ];

        return ValidatorFacade::make($data, [
            'page_id' => 'required|numeric',
            'status_code' => 'required|numeric',
            'response_time' => 'required|numeric'
        ]);
    }
}
