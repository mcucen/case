<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Developer::factory()->create([
            'name' => 'DEV 1',
            'rank' => 1,
        ]);

        Developer::factory()->create([
            'name' => 'DEV 2',
            'rank' => 2,
        ]);

        Developer::factory()->create([
            'name' => 'DEV 3',
            'rank' => 3,
        ]);

        Developer::factory()->create([
            'name' => 'DEV 4',
            'rank' => 4,
        ]);

        Developer::factory()->create([
            'name' => 'DEV 5',
            'rank' => 5,
        ]);
    }
}
