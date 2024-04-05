<?php

namespace App\Console\Commands;

use App\Models\Module;
use Illuminate\Console\Command;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-module {--id= : Module ID} {--name= : Module name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = (array) $this->option('name');
        $id = $this->option('id');
        if (sizeof($name) > 1) {
            return 1;
        }

        $module = Module::create(['id' => $id, 'name' => $name[0]]);
        if ($this->call('module:make', ['name' => $name]) != 0) {
            $module->delete();
        }
    }

}
