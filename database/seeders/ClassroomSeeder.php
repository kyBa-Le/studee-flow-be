<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classroom::create([
            "class_name" => "PNV 26A"
        ]);
        Classroom::create([
            "class_name" => "PNV 26B"
        ]);        
    }
}
