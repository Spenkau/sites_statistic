<?php

namespace App\Jobs;

use App\Models\Detail;
use App\Models\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UpdatePageDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $startTime;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->startTime = microtime(true);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pages = Page::all();

        foreach ($pages as $page) {

            try {
                $response = Http::get($page->url);

                $this->storeDetail($response, $page);
            } catch (\Exception $exception) {
                $this->storeErrorDetail($exception, $page);
            }
        }
    }

    public function getResponseTime(): float
    {
        return (float) number_format(microtime(true) - $this->startTime, 3, '.', '');
    }

    public function validateDetail(Response $response, Page $page)
    {
        $data = [
            'page_id' => $page->id,
            'status_code' => $response->status(),
            'response_time' => $this->getResponseTime()
        ];

        return Validator::make($data, [
            'page_id' => 'required|integer',
            'status_code' => 'required|integer',
            'response_time' => 'required|numeric'
        ]);
    }

    public function storeDetail(Response $response, Page $page): void
    {
        $validDetails = $this->validateDetail($response, $page);

        if ($validDetails->fails()) {
            return;
        } else {
            $detail = $validDetails->validated();

            Detail::create($detail);
        }
    }

    public function storeErrorDetail(\Exception $exception, $page)
    {
        $statusCode = $exception->getCode();
        $responseTime = $this->getResponseTime();
        $errorMessage = $exception->getMessage();

        $data = [
            'page_id' => $page->id,
            'status_code' => $statusCode,
            'response_time' => $responseTime,
            'error' => $errorMessage
        ];

        Detail::create($data);
    }
}
