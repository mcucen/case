<?php

namespace App\Services\TaskAssigner\Actions;

use App\Models\Developer;
use App\Models\Task;
use App\Services\TaskAssigner\Concerns\AssignActionInterface;

class EloquentAssignAction implements AssignActionInterface
{
    public function execute(Task $task, Developer $developer): void
    {
        $task->developer()->associate($developer)->save();
        $developer->pushEffort($task->complexity_score / $developer->rank);
    }
}
