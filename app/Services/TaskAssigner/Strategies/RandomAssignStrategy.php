<?php

namespace App\Services\TaskAssigner\Strategies;

use Illuminate\Database\Eloquent\Collection;

/**
 * @deprecated This class is inefficient. Use DefaultStrategy instead.
 * @see DefaultAssignStrategy
 */
class RandomAssignStrategy extends AssignStrategy
{
    public function multiAssign(Collection $tasks, Collection $developers): void
    {
        foreach ($tasks as $task) {
            $developer = $developers->random();

            $this->assignAction->execute($task, $developer);
        }
    }
}
