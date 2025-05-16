<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SelfStudy;

class SelfStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SelfStudy::create([
            'student_id' => 1,
            'date' => '2025-05-13',
            'subject_id' => 1,
            'lesson' => 'Math basics',
            'time_allocation' => 60,
            'learning_resources' => 'Book A, YouTube video',
            'learning_activities' => 'Read chapters, solve problems',
            'concentration' => 2,
            'is_follow_plan' => true,
            'evaluation' => 'Good understanding',
            'reinforcing_learning' => 'Repeat exercises next week',
            'notes' => 'Need to improve speed',
            'week_id' => 1,
        ]);

        SelfStudy::create([
            'student_id' => 1,
            'date' => '2025-05-14',
            'subject_id' => 2,
            'lesson' => 'Science: Electricity',
            'time_allocation' => 45,
            'learning_resources' => 'Class notes, TED-Ed video',
            'learning_activities' => 'Watched video, made summary',
            'concentration' => 3,
            'is_follow_plan' => false,
            'evaluation' => 'Partial understanding',
            'reinforcing_learning' => 'Discuss with peers',
            'notes' => 'Confused by circuits',
            'week_id' => 1,
        ]);

        SelfStudy::create([
            'student_id' => 1,
            'date' => '2025-05-15',
            'subject_id' => 3,
            'lesson' => 'History: WWII',
            'time_allocation' => 50,
            'learning_resources' => 'Documentary, Timeline PDF',
            'learning_activities' => 'Watched and annotated',
            'concentration' => 2,
            'is_follow_plan' => true,
            'evaluation' => 'Excellent focus',
            'reinforcing_learning' => 'Create timeline poster',
            'notes' => 'Loved this topic',
            'week_id' => 1,
        ]);
    }
}
