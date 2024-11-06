<?php

namespace App\Services\TaskManager\Traits;

use App\Services\TaskManager\Exceptions\TaskManagerNotRespondingException;
use Illuminate\Support\Facades\Http;

trait HasRestApi
{
    protected function rawData(): array
    {
        $mockOneRequest = Http::get($this->endpoint);

        if (!$mockOneRequest->successful()) {
            throw new TaskManagerNotRespondingException($this->name);
        }

        return $mockOneRequest->json();
    }
}
