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
            'subject_id' => 1,
            'semester_id' => 1,
            'self_goals' => 'Complete all homework and review weekly',
            'teacher_goals' => 'Attend all teacher sessions and participate actively',
            'course_goals' => 'Master core concepts in Mathematics',
            'is_achieved' => false,
        ]);

        SemesterGoal::create([
            'student_id' => 1,
            'subject_id' => 2,
            'semester_id' => 1,
            'self_goals' => 'Practice Physics problems daily',
            'teacher_goals' => 'Attend Physics lectures and submit reports',
            'course_goals' => 'Achieve an A in Physics',
            'is_achieved' => true,
        ]);
    }
}
