<?php

namespace Database\Seeders;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $notifications = [
            [
                'title' => 'Deadline is coming',
                'content' => 'Your English homework is due tomorrow (15/12/2025). Finish it early!',
                'type' => 'deadline',
                'is_read' => false,
                'receiver_id' => 1,
                'link' => '/tasks/1',
                'deadline' => Carbon::now(),
                'creator' => "Le Ky Ba",
            ],
            [
                'title' => 'Feedback from teacher',
                'content' => 'Mr. Hung sent feedback on your essay: "Good but need more evidence"',
                'type' => 'feedback',
                'is_read' => false,
                'receiver_id' => 1,
                'link' => '/assignments/1'
            ],
            [
                'title' => 'Reminder',
                'content' => 'Ms. Lan reminded you about the Literature discussion',
                'type' => 'reminder',
                'is_read' => false,
                'receiver_id' => 1,
                'link' => '/discussions/1'
            ],
            [
                'title' => 'New assignment',
                'content' => 'Math exercises chapter 7 posted. Deadline: 20/12/2025',
                'type' => 'deadline',
                'is_read' => false,
                'receiver_id' => 1,
                'link' => '/tasks/2',
                'deadline' => Carbon::now(),
                'creator' => "Le Ky Ba",
            ],
            [
                'type' => 'submit',
                'title' => 'Student submitted Nguyen Van A',
                'content' => 'Math Chapter 3 homework has been submitted before the deadline. Please grade it when you have time.',
                'receiver_id' => 3,
                'is_read' => false,
                'link' => '/assignments/123'
            ],
            [
                'type' => 'question',
                'title' => 'Question from student Tran Thi B',
                'content' => 'Teacher, I dont understand the proof of the theorem on page 45 of the textbook. Can you explain more?',
                'receiver_id' => 3,
                'is_read' => false,
                'link' => '/questions/456'
            ],
            [
                'type' => 'reminder',
                'title' => 'Check Weekly learning report',
                'content' => 'Week 15 learning report ready: 85% of students completed assignments, 3 students need extra support.',
                'receiver_id' => 3,
                'is_read' => true,
                'link' => '/reports/789'
            ],
        ];

        foreach ($notifications as $notification) {
            Notification::create($notification);
        }
    }
}
