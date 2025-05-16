<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InClass;
use Carbon\Carbon;

class InClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InClass::create([
            'user_id' => 1,
            'date' => Carbon::now()->toDateString(),
            'subject_id' => 1,
            'lesson' => 'Introduction to Laravel',
            'self_assessment' => 2,
            'difficulties' => 'Khó hiểu về relationship.',
            'plan' => 'Xem lại video bài giảng và đọc tài liệu chính thức.',
            'is_problem_solved' => true,
            'week_id' => 1,
        ]);

        InClass::create([
            'user_id' => 2,
            'date' => Carbon::now()->toDateString(),
            'subject_id' => 2,
            'lesson' => 'JavaScript Loops',
            'self_assessment' => 1,
            'difficulties' => 'Không nhớ cú pháp forEach.',
            'plan' => 'Làm bài tập thêm.',
            'is_problem_solved' => false,
            'week_id' => null,
        ]);
    }
}
