<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Comment\CommentService;

class CommentController extends Controller
{
    protected CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function create(Request $request)
    {
        try {
            $commenterId = $request->user()->id;

            $request->merge(['commenter_id' => $commenterId]);

            $newComment = $this->commentService->create($request->only([
                'commenter_id',
                'receiver_id',
                'content',
            ]));

            return response()->json([
                'message' => 'Comment created successfully!',
                'commentId' => $newComment->id,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create comment',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getCommentById($id)
    {
        try {
            $comment = $this->commentService->getCommentById($id);
            return response()->json($comment);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Failed to fetch comment',
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function getCommentsByReceiverId($receiverId)
    {
        try {
            $comments = $this->commentService->getCommentsByReceiverId($receiverId);
            return response()->json([
                'receiver_id' => $receiverId,
                'comments' => $comments,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Failed to fetch comments',
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
