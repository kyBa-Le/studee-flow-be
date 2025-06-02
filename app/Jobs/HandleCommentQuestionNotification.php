<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\User;
use App\ThirdPartyService\NotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class HandleCommentQuestionNotification implements ShouldQueue
{
    use Queueable;
    private $comment;
    private $commentCreator;
    private NotificationService $notificationService;


    /**
     * Create a new job instance.
     */
    public function __construct($comment, $commentCreator)
    {
        $this->comment = $comment;
        $this->notificationService = new NotificationService();
        $this->commentCreator = $commentCreator;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("__________________This is start create notification_____");
        $newNotification = [
            "title" => $this->commentCreator->full_name . " tag you to a comment",
            "content" => $this->comment["content"],
            "type" => "question",
            "receiver_id" => $this->comment["receiver_id"],
            "is_read" => false,
            "link" => "/student/{$this->commentCreator->id}/learning-journal",
            'creator' => $this->commentCreator->full_name
        ];
        $createdNotification = Notification::create($newNotification);
        $receiver = User::where("id", $createdNotification->receiver_id)->first();
        $this->notificationService->sendFCMNotification($receiver->fcm_token, $createdNotification->title, $createdNotification->toArray());
    }
}
