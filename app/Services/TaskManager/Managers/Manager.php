<?php

namespace App\Services\TaskManager\Managers;

use App\Services\TaskManager\Concerns\ResponseAdapterInterface;
use App\Services\TaskManager\Concerns\TaskManagerInterface;
use App\Services\TaskManager\Data\TaskCollection;

abstract class Manager implements TaskManagerInterface
{
    public function __construct(
        protected readonly ResponseAdapterInterface $adapter,
    )
    {
    }

    abstract protected function rawData(): array;

    public function getTasks(): TaskCollection
    {
        return $this->adapter->adapt($this->rawData());
    }
}
