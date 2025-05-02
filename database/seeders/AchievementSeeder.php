<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::create([
            "image_link" => "https://example.com/image1.png",
            "content" => "Achievement 1",
            "student_id" => 1,
            "semester" => 1,
            "title" => "Completed Beginner English Course",
        ]);
        Achievement::create([
            "image_link" => "https://example.com/image2.png",
            "content" => "Achievement 2",
            "student_id" => 1,
            "semester" => 2,
            "title" => "Completed Intermediate English Course",
        ]);
        Achievement::create([
            "image_link" => "https://example.com/image3.png",
            "content" => "Achievement 3",
            "student_id" => 1,
            "semester" => 3,
            "title" => "Built a Personal Portfolio Website",
        ]);
        Achievement::create([
            "image_link" => "https://example.com/image4.png",
            "content" => "Achievement 4",
            "student_id" => 1,
            "semester" => 4,
            "title" => "Completed Advanced English Course",
        ]);
        Achievement::create([
            "image_link" => "https://example.com/image5.png",
            "content" => "Achievement 5",
            "student_id" => 1,
            "semester" => 5,
            "title" => "Earned a Certificate in Web Development",
        ]);
        Achievement::create([
            "image_link" => "https://example.com/image6.png",
            "content" => "Achievement 6",
            "student_id" => 1,
            "semester" => 6,
            "title" => "Completed a Python Programming Bootcamp",
        ]);
        Achievement::create([
            "image_link" => "https://example.com/image7.png",
            "content" => "Achievement 7",
            "student_id" => 1,
            "semester" => 1,
            "title" => "Developed a Mobile App for Language Learning",
        ]);
        Achievement::create([
            "image_link" => "https://example.com/image8.png",
            "content" => "Achievement 8",
            "student_id" => 1,
            "semester" => 2,
            "title" => "Earned a Certificate in Cloud Computing",
        ]);
    }
}
