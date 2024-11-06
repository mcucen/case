<?php

namespace App\Services\TaskManager\Concerns;

use App\Services\TaskManager\Data\TaskCollection;

interface TaskManagerInterface
{
    public function getTasks(): TaskCollection;
}
