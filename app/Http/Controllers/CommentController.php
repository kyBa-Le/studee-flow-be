<?php
namespace App\Http\Controllers;

use GPBMetadata\Google\Api\Log;
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

            $comment = $request->all();
            $comment["commenter_id"] = $commenterId;
            \Illuminate\Support\Facades\Log::info("_______________{$comment['in_class_id']}");

            $newComment = $this->commentService->create($comment);

            return response()->json([
                'message' => 'Comment created successfully!',
                'comment' => $newComment,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create comment',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getCommentByJournalId(Request $request)
    {
        try {
            $type = $request->query('type');
            $journalId = $request->query('journal_id');
            $comment = $this->commentService->getCommentByJournalId($type, $journalId);
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
