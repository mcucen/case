<?php

namespace App\Services\TaskAssigner\Strategies;

use App\Services\TaskAssigner\Concerns\AssignActionInterface;
use App\Services\TaskAssigner\Concerns\AssignStrategyInterface;

abstract class AssignStrategy implements AssignStrategyInterface
{
    public function __construct(protected readonly AssignActionInterface $assignAction)
    {
    }
}
