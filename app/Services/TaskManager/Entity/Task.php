<?php

namespace App\Services\TaskManager\Entity;

readonly class Task
{
    public int $complexityScore;
    public function __construct(
        public int $id,
        public int $duration,
        public int $complexity,
    ) {
        $this->complexityScore = $complexity * $duration;
    }
}
