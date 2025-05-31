<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        Comment::create([
            'commenter_id' => 1,
            'receiver_id' => 3,
            'content' => 'Can you please review my last assignment?',
            'created_at' => Carbon::now(),
        ]);

        Comment::create([
            'commenter_id' => 3,
            'receiver_id' => 1,
            'content' => 'Keep improving your speaking skill.',
            'created_at' => Carbon::now()->subDay(),
        ]);
    }
}
