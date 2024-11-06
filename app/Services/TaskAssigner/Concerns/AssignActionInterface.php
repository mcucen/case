<?php

namespace App\Services\TaskAssigner\Concerns;

use App\Models\Developer;
use App\Models\Task;

interface AssignActionInterface
{
    public function execute(Task $task, Developer $developer): void;
}
