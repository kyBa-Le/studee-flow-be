<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(array $data): Comment
    {
        return Comment::create($data);
    }

    public function getCommentById($id)
    {
        return Comment::find($id);
    }

    public function getCommentsByReceiverId(int $receiverId)
    {
       return Comment::with(['commenter:id', 'receiver:id'])->whereHas('receiver', function ($query) use ($receiverId) {
            $query->where('id', $receiverId);
        })->get()->toArray();
    }
}
