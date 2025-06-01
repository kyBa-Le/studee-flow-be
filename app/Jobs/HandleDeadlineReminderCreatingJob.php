<?php

namespace App\Jobs;

use App\Models\Deadline;
use App\Models\Notification;
use App\Services\Deadline\DeadlineTimeService;
use App\ThirdPartyService\NotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class HandleDeadlineReminderCreatingJob implements ShouldQueue
{
    use Queueable;

    private Deadline $deadline;
    private NotificationService $notificationService;
    private string $teacherName;
    public function __construct(Deadline $deadline, $teacherName = null)
    {
        $this->deadline = $deadline;
        $this->notificationService = new NotificationService();
        $this->teacherName = $teacherName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $students = $this->deadline->classroom->students;
        $dueTime = DeadlineTimeService::getTheEndedTime($this->deadline);
        foreach ($students as $student) {
            $notification = [
                "title" => "Deadline reminder - " . $this->deadline->title,
                "content" => "Learning journal checkup due at {$dueTime}. Let's complete your journal and submit. Come on!",
                "type" => "deadline",
                "receiver_id" => $student->id,
                "is_read" => false,
                "link" => "/student/learning-journal",
                'creator' => $this->teacherName,
                'deadline' => $dueTime,
            ];
            $createdNotification = Notification::create($notification);
            \Illuminate\Support\Facades\Log::info("TOKEN: {$student->fcm_token}}");
            $this->notificationService->sendFCMNotification($student->fcm_token, $createdNotification->title, $createdNotification->toArray());
        }
    }
}
