<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Week;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClassroomSeeder::class,
            UserSeeder::class,
            TeacherClassroomSeeder::class,
            TaskSeeder::class,
            AchievementSeeder::class,
            SubjectSeeder::class,
            SemesterSeeder::class,
            SemesterGoalSeeder::class,
            WeekSeeder::class,
            InClassSeeder::class,
            StudentProgressSeeder::class,
            WeeklyGoalSeeder::class,
            SelfStudySeeder::class
        ]);
    }
}
