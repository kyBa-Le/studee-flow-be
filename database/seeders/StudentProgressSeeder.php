<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentProgress;

class StudentProgressSeeder extends Seeder
{
    public function run(): void
    {
        StudentProgress::create([
            'student_id' => 1,
            'completion_rate_weekly' => 85.5,
            'deadline_completion_rate' => 90.0,
            'learning_journal_feedback' => 'Good',
        ]);
    }
}
