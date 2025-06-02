<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'full_name' => 'Lê Gia Toàn',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'student_classroom_id' => 1
        ]);
        User::create([
            'full_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::create([
            'full_name' => 'Cô Trang',
            'email' => 'teacher@example.com',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
    }
}
