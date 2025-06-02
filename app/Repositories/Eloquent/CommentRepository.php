<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(array $data): Comment
    {
        $newComment = Comment::create($data);
        $newComment->load(['commenter:id,full_name,avatar_link']);
        return $newComment;
    }

    public function getCommentByJournalId($journalColumn, $journalId)
    {
        return Comment::where($journalColumn, $journalId)
            ->with(['commenter:id,full_name,avatar_link'])
            ->get();
    }

    public function getCommentsByReceiverId(int $receiverId)
    {
       return Comment::with(['commenter:id', 'receiver:id'])->whereHas('receiver', function ($query) use ($receiverId) {
            $query->where('id', $receiverId);
        })->get()->toArray();
    }
}
