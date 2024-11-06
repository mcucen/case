<?php

namespace App\Services\TaskManager\Managers\MockOneTaskManager;

use App\Services\TaskManager\Managers\Manager;
use App\Services\TaskManager\Traits\HasRestApi;

class MockOneTaskManager extends Manager
{
    use HasRestApi;

    private readonly string $endpoint;

    public function __construct(MockOneResponseAdapter $adapter)
    {
        parent::__construct($adapter);
        $this->endpoint = config('services.task_managers.mock_one.endpoint');
    }
}
