<?php

namespace App\Http\Controllers;

use App\Services\User\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getAllTasksByStudentId (Request $request)
    {
        $userId = $request->user()->id;
        $tasks = $this->taskService->getAllTasksByStudentId($userId);
        return response()->json($tasks);
    }
}
