<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeAdminControllerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin_controller {name} {--model=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model = $this->option('model');
        $defaultControllerArg = ["name" => "Users\\Admin\\" . $this->argument('name')];

        if($model !== "false") {
            $defaultControllerArg["--model"] = $model;
        }

        $this->call('make:controller', $defaultControllerArg);
    }
}
