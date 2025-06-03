<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            "student_id" => 1,
                "start_time" => now(),
                "end_time" => now()->addHours(1),
                "title" => "Task 1",
            ]
        );
        Task::create(
            [
                "student_id" => 1,
                "start_time" => now()->addHours(2),
                "end_time" => now()->addHours(3),
                "title" => "Task 1",
            ]
        );
    }
}
