<?php

namespace App\Http\Controllers;

use App\Services\Deadline\DeadlineService;
use Illuminate\Http\Request;

class DeadlineController
{
    protected DeadlineService $deadlineService;

    public function __construct(DeadlineService $deadlineService)
    {
        $this->deadlineService = $deadlineService;
    }

    public function createDeadlinesInBulk(Request $request, $classroomId)
    {
        try {
            $this->deadlineService->createDeadlines($request->get('deadlines'), $classroomId);
            return response()->json(["message" => "Deadlines created"]);
        } catch (\Exception $exception)
        {
            return response()->json(["message" => $exception->getMessage()]);
        }
    }

    public function getAllDeadlinesByClassroomId(int $classroomId): array
    {
        return $this->deadlineService->getAllDeadlinesByClassroomId($classroomId);
    }
}
