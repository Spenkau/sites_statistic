<?php

namespace App\Console\Commands;

use App\Jobs\UpdateApiPreprodDetails;
use App\Jobs\UpdateApiProcessingDetails;
use App\Services\ApiPointService;
use Illuminate\Console\Command;

class UpdateApiPointDetailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:api-point-details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update details of api points';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        UpdateApiPreprodDetails::dispatch(app(ApiPointService::class));
        UpdateApiProcessingDetails::dispatch(app(ApiPointService::class));

        $this->info('API points details stored successfully');
    }
}
