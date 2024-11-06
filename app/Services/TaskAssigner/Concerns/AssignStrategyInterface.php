<?php

namespace App\Services\TaskAssigner\Concerns;

use Illuminate\Database\Eloquent\Collection;

interface AssignStrategyInterface
{
    public function multiAssign(Collection $tasks, Collection $developers): void;
}
