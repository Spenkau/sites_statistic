<?php

namespace App\Console\Commands;

use App\Jobs\UpdatePageDetails;
use Illuminate\Console\Command;

class UpdatePageDetailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:page-details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new page details';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        UpdatePageDetails::dispatch();
    }
}
