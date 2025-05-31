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

    public function getCommentById($id)
    {
        return $this->commentRepository->getCommentById($id);
    }

    public function getCommentsByReceiverId(int $receiverId)
    {
        return $this->commentRepository->getCommentsByReceiverId($receiverId);
    }
}
