<?php

namespace App\Services\Comment;
use App\Jobs\HandleCommentQuestionNotification;
use App\Jobs\HandleDeadlineReminderCreatingJob;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function create(array $data)
    {
        $comment = $this->commentRepository->create($data);
        if ($comment->receiver_id) {
            $creator = request()->user();
            HandleCommentQuestionNotification::dispatch($comment, $creator)->withoutDelay();
        }
        return $comment;
    }

    public function getCommentByJournalId($type, $journalId)
    {
        $journal = "self_study_id";
        if ($type == "in_class") {
            $journal = "in_class_id";
        }
        return $this->commentRepository->getCommentByJournalId($journal, $journalId);
    }

    public function getCommentsByReceiverId(int $receiverId)
    {
        return $this->commentRepository->getCommentsByReceiverId($receiverId);
    }
}
