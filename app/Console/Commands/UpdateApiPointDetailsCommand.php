<?php

namespace App\Console\Commands;

use App\Jobs\UpdateApiPointDetails;
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
    protected $description = 'Update details of api point';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        UpdateApiPointDetails::dispatch(app(ApiPointService::class));

        $this->info('API points details stored successfully');
    }
}
