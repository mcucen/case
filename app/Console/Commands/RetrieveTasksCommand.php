<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Services\TaskManager\Concerns\TaskManagerInterface;
use Illuminate\Console\Command;

class RetrieveTasksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:retrieve-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve tasks from all providers';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $taskManagers = app('taskManagers');

        /** @var TaskManagerInterface $taskManager */
        foreach ($taskManagers as $taskManager) {
            /** @var \App\Services\TaskManager\Entity\Task $task */
            foreach ($taskManager->getTasks() as $task) {
                Task::query()->create([
                    'provider' => get_class($taskManager),
                    'provider_id' => $task->id,
                    'name' => get_class($taskManager). ' #' . $task->id,
                    'estimated_hours' => $task->duration,
                    'complexity' => $task->complexity,
                    'complexity_score' => $task->complexityScore,
                ]);
            }
        }

        return self::SUCCESS;
    }
}
