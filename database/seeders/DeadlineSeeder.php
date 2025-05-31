<?php

namespace Database\Seeders;

use App\Models\Deadline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        for ($i = 1; $i <= 3; $i++) {
            $date = $now->copy()->addDays($i)->toDateString();

            Deadline::create([
                'started_at' => '09:00:00',
                'ended_at' => '09:30:00',
                'title' => 'Portfolio Checkup - Day ' . $i,
                'date' => $date,
                'classroom_id' => 1
            ]);
        }
    }
}
