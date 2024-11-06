<?php

namespace App\Services\TaskManager\Managers\MockTwoTaskManager;

use App\Services\TaskManager\Concerns\ResponseAdapterInterface;
use App\Services\TaskManager\Data\TaskCollection;
use App\Services\TaskManager\Entity\Task;

class MockTwoResponseAdapter implements ResponseAdapterInterface
{
    public function adapt(array $data): TaskCollection
    {
        $adapted = array_map(function ($item) {
            return new Task($item['id'], $item['sure'], $item['zorluk']);
        }, $data);

        return TaskCollection::fromArray($adapted);
    }
}
