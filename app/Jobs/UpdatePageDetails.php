<?php

namespace App\Jobs;

use App\Services\DetailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatePageDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public DetailService $detailService;

    /**
     * Create a new job instance.
     */
    public function __construct(DetailService $detailService)
    {
        $this->detailService = $detailService;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pages = $this->detailService->all();

        foreach ($pages as $page) {
            $this->detailService->updateDetails($page);
        }
    }
}
