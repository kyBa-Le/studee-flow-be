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
            "image_link" => "https://marketplace.canva.com/EAFy42rCTA0/1/0/1600w/canva-blue-minimalist-certificate-of-achievement-_asVJz8YgJE.jpg",
            "content" => "Achievement 1",
            "student_id" => 1,
            "semester" => 1,
            "title" => "Completed Beginner English Course",
        ]);
        Achievement::create([
            "image_link" => "https://i.pinimg.com/736x/5a/ea/37/5aea371e3f0020f394607f33ebacbca5.jpg",
            "content" => "Achievement 2",
            "student_id" => 1,
            "semester" => 2,
            "title" => "Completed Intermediate English Course",
        ]);
        Achievement::create([
            "image_link" => "https://www.typecalendar.com/wp-content/uploads/2023/07/Certificate-of-Achievement.jpg",
            "content" => "Achievement 3",
            "student_id" => 1,
            "semester" => 3,
            "title" => "Built a Personal Portfolio Website",
        ]);
        Achievement::create([
            "image_link" => "https://d3jmn01ri1fzgl.cloudfront.net/photoadking/webp_thumbnail/elegant-achievement-certificate-template-z2w19o30db6376.webp",
            "content" => "Achievement 4",
            "student_id" => 1,
            "semester" => 4,
            "title" => "Completed Advanced English Course",
        ]);
        Achievement::create([
            "image_link" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyP8psCLCLaixCjODHNILrGcKbzaTRkazmFpR1pRjYUjl4ciPwcpfPfxNq14L20lBOpt4&usqp=CAU",
            "content" => "Achievement 5",
            "student_id" => 1,
            "semester" => 5,
            "title" => "Earned a Certificate in Web Development",
        ]);
        Achievement::create([
            "image_link" => "https://blog.photoadking.com/wp-content/uploads/2023/04/1681205085695-1-1024x791.jpg",
            "content" => "Achievement 6",
            "student_id" => 1,
            "semester" => 6,
            "title" => "Completed a Python Programming Bootcamp",
        ]);
        Achievement::create([
            "image_link" => "https://blog.photoadking.com/wp-content/uploads/2023/04/1681206358006-1-1024x791.jpg",
            "content" => "Achievement 7",
            "student_id" => 1,
            "semester" => 1,
            "title" => "Developed a Mobile App for Language Learning",
        ]);
        Achievement::create([
            "image_link" => "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/professional-certificate-design-template-882d9df12b1505d88cfb20c9b7ed22bb_screen.jpg?ts=1689415226",
            "content" => "Achievement 8",
            "student_id" => 1,
            "semester" => 2,
            "title" => "Earned a Certificate in Cloud Computing",
        ]);
    }
}
