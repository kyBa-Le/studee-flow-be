<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semester;
use Illuminate\Support\Carbon;

class SemesterSeeder extends Seeder
{
    public function run()
    {
        Semester::create([
            'name' => 'Semester 1',
            'started_at' => '2025-01-01',
            'ended_at' => '2025-05-31',
            'classroom_id' => 1,
        ]);

        Semester::create([
            'name' => 'Semester 2',
            'started_at' => '2025-06-01',
            'ended_at' => '2025-10-31',
            'classroom_id' => 1,
        ]);

        Semester::create([
            'name' => 'Semester 3',
            'started_at' => '2025-11-01',
            'ended_at' => '2026-03-31',
            'classroom_id' => 1,
        ]);

        Semester::create([
            'name' => 'Semester 4',
            'started_at' => '2026-04-01',
            'ended_at' => '2026-08-31',
            'classroom_id' => 1,
        ]);

        Semester::create([
            'name' => 'Semester 5',
            'started_at' => '2026-09-01',
            'ended_at' => '2027-01-31',
            'classroom_id' => 1,
        ]);

        Semester::create([
            'name' => 'Semester 6',
            'started_at' => '2027-02-01',
            'ended_at' => '2027-06-30',
            'classroom_id' => 1,
        ]);
    }
}
