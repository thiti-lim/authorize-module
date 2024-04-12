<?php

namespace App\Console\Commands;

use App\Models\Menu;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class MakeMenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-menu {--module= : Module ID} {--name=Menu name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make menu';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $menuName = ucfirst(Str::camel($this->option('name')));
        $dbName = Str::snake($this->option('name'));
        $module = Module::findOrFail($this->option('module'));

        Menu::create(['name' => $dbName, 'module_id' => $module->id]);
        $this->call('module:make-model', [
            'model' => $menuName,
            'module' => $module->name,
            '--controller' => true,
            '--migration' => true,
            '--request' => true,
        ]);
        $this->call('module:make-factory', ['name' => $menuName, 'module' => $module->name]);
    }
}
