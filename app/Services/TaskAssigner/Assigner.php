<?php

namespace App\Services\TaskAssigner;

use App\Services\TaskAssigner\Concerns\AssignStrategyInterface;
use Illuminate\Database\Eloquent\Collection;

class Assigner
{
    public function __construct(private AssignStrategyInterface $strategy)
    {
    }

    public function setStrategy(AssignStrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function multiAssign(Collection $tasks, Collection $developers): void
    {
        $this->strategy->multiAssign($tasks, $developers);
    }
}
