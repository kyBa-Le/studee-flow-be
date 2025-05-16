<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeeklyGoal;

class WeeklyGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WeeklyGoal::create([
            'student_id' => 1,
            'week_id' => 1,
            'goal' => 'thành bài tập tuần này',
            'is_achieved' => false,
        ]);
        
        WeeklyGoal::create([
            'student_id' => 1,
            'week_id' => 1,
            'goal' => 'thành bài tập tuần này',
            'is_achieved' => false,
        ]);
    }
}