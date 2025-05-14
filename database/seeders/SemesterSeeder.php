<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    public function run()
    {
        Semester::create([
            'name' => 'Semester 1 - 2025',
            'started_at' => '2025-01-01',
            'ended_at' => '2025-06-01',
        ]);

        Semester::create([
            'name' => 'Semester 2 - 2025',
            'started_at' => '2025-07-01',
            'ended_at' => '2025-12-01',
        ]);
    }
}
