<?php

namespace App\Repositories\Interfaces;
use App\Models\Comment;

interface CommentRepositoryInterface
{
    public function create(array $data);

    public function getCommentByJournalId($journal, $journalId);

    public function getCommentsByReceiverId(int $receiverId);
}
