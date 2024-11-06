<?php

namespace App\Console\Commands;

use App\Models\Developer;
use App\Models\Task;
use App\Services\TaskAssigner\Actions\EloquentAssignAction;
use App\Services\TaskAssigner\AssignerFactory;
use App\Services\TaskAssigner\Strategies\DefaultAssignStrategy;
use Illuminate\Console\Command;

class AssignTaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign tasks to developers';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $assigner = AssignerFactory::fromStrategy(new DefaultAssignStrategy(new EloquentAssignAction()));

        $tasks = Task::all();
        $developers = Developer::all();

        $assigner->multiAssign($tasks ,$developers);

        return self::SUCCESS;
    }
}
