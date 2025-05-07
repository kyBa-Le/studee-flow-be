<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function getAllTeachers() {
        $teachers = $this->userService->findAllUsersByRole('teacher');
        return response()->json($teachers);
    }

    public function getAllStudents() {
        $students = $this->userService->findAllUsersByRole('student');
        return response()->json($students);
    }
}
