<?php

namespace App\Services\TaskManager\Managers\MockTwoTaskManager;

use App\Services\TaskManager\Managers\Manager;
use App\Services\TaskManager\Traits\HasRestApi;

class MockTwoTaskManager extends Manager
{
    use HasRestApi;

    private readonly string $endpoint;

    public function __construct(MockTwoResponseAdapter $adapter)
    {
        parent::__construct($adapter);
        $this->endpoint = config('services.task_managers.mock_two.endpoint');
    }
}
