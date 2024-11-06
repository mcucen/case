<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends Model
{
    protected $appends = ['effort'];

    protected $fillable = [
        'name',
        'rank',
    ];

    private float $effort = 0;

    public function getEffortAttribute(): float
    {
        return $this->effort;
    }

    public function pushEffort(float $effort): void
    {
        $this->effort += $effort;
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
