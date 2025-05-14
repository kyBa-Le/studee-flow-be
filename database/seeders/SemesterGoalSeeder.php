<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SemesterGoal;

class SemesterGoalSeeder extends Seeder
{
    public function run()
    
    {
        SemesterGoal::create([
            'student_id' => 1,
            'semester_id' => 1,
            'module' => 'Mathematics',
            'goals' => 'Complete all assignments and exams',
            'is_achieved' => false,
        ]);

        SemesterGoal::create([
            'student_id' => 2,
            'semester_id' => 1,
            'module' => 'Physics',
            'goals' => 'Pass all question with A grade',
            'is_achieved' => true,
        ]);
    }
}