<?php

namespace App\Services\Comment;
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
        return $this->commentRepository->create($data);
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
