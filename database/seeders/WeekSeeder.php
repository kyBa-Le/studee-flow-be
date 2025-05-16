<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Week;

class WeekSeeder extends Seeder
{
   
    public function run(): void
    {
         Week::create([
            'classroom_id' => 1,
            'week' => 1,
            'started_date' => '2025-05-13',
            'end_date' => '2025-05-19',
        ]);

        Week::create([
            'classroom_id' => 1,
            'week' => 2,
            'started_date' => '2025-05-20',
            'end_date' => '2025-05-26',
        ]);
    }
}
