<?php

namespace App\Services\TaskManager\Exceptions;

class TaskManagerNotRespondingException extends \Exception
{
    public function __construct(string $managerClass)
    {
        parent::__construct(sprintf('Task manager %s not responding', $managerClass));
    }
}
