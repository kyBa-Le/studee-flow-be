<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        Subject::create([
            'subject_name' => 'TOEIC',
            'classroom_id' => 1,
        ]);

        Subject::create([
            'subject_name' => 'Speaking',
            'classroom_id' => 1,
        ]);

        Subject::create([
            'subject_name' => 'IT English',
            'classroom_id' => 2,
        ]);
    }
}
