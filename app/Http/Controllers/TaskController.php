<?php

namespace App\Http\Controllers;

use App\Services\Task\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getAllTasksByStudentId ($studentId)
    {
        $tasks = $this->taskService->getAllTasksByStudentId( $studentId);
        return response()->json($tasks);
    }
}
