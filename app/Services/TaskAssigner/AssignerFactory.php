<?php

namespace App\Services\TaskAssigner;

use App\Services\TaskAssigner\Concerns\AssignStrategyInterface;

class AssignerFactory
{
    public static function fromStrategy(AssignStrategyInterface $strategy): Assigner
    {
        return new Assigner($strategy);
    }
}
