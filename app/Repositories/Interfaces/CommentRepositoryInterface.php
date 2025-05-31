<?php

namespace App\Repositories\Interfaces;
use App\Models\Comment;

interface CommentRepositoryInterface
{
    public function create(array $data);

    public function getCommentById($id);

    public function getCommentsByReceiverId(int $receiverId);
}
