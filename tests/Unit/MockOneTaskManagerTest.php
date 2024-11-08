<?php

use App\Services\TaskManager\Managers\MockOneTaskManager\MockOneResponseAdapter;
use App\Services\TaskManager\Managers\MockOneTaskManager\MockOneTaskManager;

test('mock one manager generates data correctly', function () {
    $mockOneTaskManager = Mockery::mock(MockOneTaskManager::class)->makePartial();
    $mockOneTaskManager->shouldAllowMockingProtectedMethods()->shouldReceive('rawData')->andReturn([
        [
            'id' => 1,
            'estimated_duration' => 1,
            'value' => 1,
        ],
        [
            'id' => 2,
            'estimated_duration' => 3,
            'value' => 4,
        ],
    ]);

    $mockOneTaskManager->setAdapter(app(MockOneResponseAdapter::class));

    $taskCollection = $mockOneTaskManager->getTasks();

    expect($taskCollection)
        ->toBeIterable()
        ->toHaveCount(2);

    foreach ($taskCollection as $task) {
        expect($task)->toBeInstanceOf(\App\Services\TaskManager\Entity\Task::class)
            ->and($task->id)->toBeInt()
            ->and($task->duration)->toBeInt()
            ->and($task->complexity)->toBeInt()
            ->and($task->complexityScore)->toBeInt();
        ;
    }
});
