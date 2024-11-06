<?php

namespace App\Services\TaskManager\Concerns;

use App\Services\TaskManager\Data\TaskCollection;

interface ResponseAdapterInterface
{
    public function adapt(array $data): TaskCollection;
}
