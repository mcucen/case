<?php

namespace App\Services\TaskManager\Managers\MockOneTaskManager;

use App\Services\TaskManager\Concerns\ResponseAdapterInterface;
use App\Services\TaskManager\Data\TaskCollection;
use App\Services\TaskManager\Entity\Task;

class MockOneResponseAdapter implements ResponseAdapterInterface
{
    public function adapt(array $data): TaskCollection
    {
        $adapted = array_map(function ($item) {
            return new Task($item['id'], $item['estimated_duration'], $item['value']);
        }, $data);

        return TaskCollection::fromArray($adapted);
    }
}
