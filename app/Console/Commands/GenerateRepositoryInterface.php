<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateRepositoryInterface extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repointerface {modelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates interface file in the "app/Repositories/Interfaces" directory with specified name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modelName = $this->argument('modelName');

        if (empty($modelName)) {
            $this->error('Model Name Invalid..!');
        }

        if (!file_exists('app/Repositories')) {

            mkdir('app/Repositories', 0777, true);

            $repositoryFileName = 'app/Repositories/' . $modelName . 'Repository.php';

            if (!file_exists($repositoryFileName)) {
                $repositoryFileContent = "<?php\n\nnamespace App\\Repositories;\n\nclass " . $modelName . "Repository {\n}";

                file_put_contents($repositoryFileName, $repositoryFileContent);

                $this->info('Repository Files Created Successfully.');

            } else {
                $this->error('Repository Files Already Exists.');
            }
        }

        if (!file_exists('app/Repositories/Interfaces')) {

            mkdir('app/Repositories/Interfaces', 0777, true);

            $interfaceFileName = 'app/Repositories/Interfaces/' . $modelName . 'RepositoryInterface.php';

            if (!file_exists($interfaceFileName)) {
                $interfaceFileContent = "<?php\n\nnamespace App\\Repositories\\Interfaces;\n\ninterface " . $modelName . "RepositoryInterface \n{\n\n}";

                file_put_contents($interfaceFileName, $interfaceFileContent);

                $this->info('Repository Interface Files Created Successfully.');

            } else {
                $this->error('Repository Interface Files Already Exists.');
            }
        }
    }
}
