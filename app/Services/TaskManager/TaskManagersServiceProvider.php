<?php

namespace App\Services\TaskManager;

use App\Services\TaskManager\Managers\MockOneTaskManager\MockOneTaskManager;
use App\Services\TaskManager\Managers\MockTwoTaskManager\MockTwoTaskManager;
use Illuminate\Support\ServiceProvider;

class TaskManagersServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $taskManagers = [
            MockOneTaskManager::class,
            MockTwoTaskManager::class,
        ];

        foreach ($taskManagers as $taskManager) {
            $this->app->singleton($taskManager, $taskManager);
        }

        $this->app->singleton('taskManagers', fn() => array_map(fn($tm) => app($tm), $taskManagers));
    }
}
