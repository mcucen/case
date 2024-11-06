<?php

namespace App\Services\TaskAssigner\Strategies;

use App\Models\Developer;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class DefaultAssignStrategy extends AssignStrategy
{
    public function multiAssign(Collection $tasks, Collection $developers): void
    {
        $tasks = $tasks->sortByDesc('complexity_score');

        $effortTolerance = 0;
        $totalTaskEffort = Task::query()->sum('complexity_score');
        $teamUnitEffort = Developer::query()->sum('rank');
        $effortEach = ceil($totalTaskEffort / $teamUnitEffort) + $effortTolerance;

        /** @var Task $task */
        foreach ($tasks as $task) {
            $sortedDevelopers = $developers->sortBy([
                ['effort', 'asc'],
                ['rank', 'desc']
            ]);

            /** @var Developer $developer */
            foreach ($sortedDevelopers as $developer) {
                $developerEffortPreview = $developer->effort + $task->complexity_score / $developer->rank;

                if ($developerEffortPreview > $effortEach) {
                    continue;
                }

                $this->assignAction->execute($task, $developer);
                break;
            }
        }
    }
}
