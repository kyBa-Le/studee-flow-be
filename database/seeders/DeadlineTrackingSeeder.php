<?php

namespace Database\Seeders;

use App\Models\DeadlineTracking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeadlineTrackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeadlineTracking::create([
            'student_id' => 1
        ]);
    }
}
