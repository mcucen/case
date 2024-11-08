<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class WeeklyTasksController extends Controller
{
    public function __invoke(): View
    {
        $taskGroups = Task::query()->with('developer')->get()->groupBy('developer_id')->sortKeys();

        $developerEfforts = $taskGroups->map(function ($taskGroup) {
            return $taskGroup->sum(function ($task) {
                return $task->complexity_score / $task->developer->rank;
            });
        });

        $maxEffort = $developerEfforts->max();

        $weekCount = round($maxEffort / 45, 2);

        return view('weekly-tasks', [
            'taskGroups' => $taskGroups,
            'developerEfforts' => $developerEfforts,
            'maxEffort' => $maxEffort,
            'weekCount' => $weekCount,
        ]);
    }
}
