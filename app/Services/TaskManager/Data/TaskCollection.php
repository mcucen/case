<?php

namespace App\Services\TaskManager\Data;

use App\Services\TaskManager\Entity\Task;
use App\Services\TaskManager\Exceptions\InvalidTaskDataException;
use Traversable;

class TaskCollection implements \IteratorAggregate, \Countable
{
    private array $tasks = [];

    public static function fromArray(array $tasks): self {
        $instance = new self();
        $instance->push($tasks);

        return $instance;
    }

    public function push(Task|array $task): void
    {
        if (is_array($task)) {
            $this->pushArray($task);

            return;
        }

        $this->tasks[] = $task;
    }

    private function pushArray(array $tasks): void
    {
        if (! $this->validateArray($tasks)) {
            throw new InvalidTaskDataException();
        }

        $this->tasks = array_merge($this->tasks, $tasks);
    }

    private function validateArray(array $tasks): bool
    {
        return collect($tasks)->filter(fn($task) => ! $task instanceof Task)->isEmpty();
    }

    public function toArray(): array
    {
        return $this->tasks;
    }

    public function getIterator(): Traversable
    {
        foreach ($this->tasks as $task) {
            yield $task;
        }
    }

    public function count(): int
    {
        return count($this->tasks);
    }
}
