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

    public function createStudents(Request $request) {
        $emails = $request->input('emails');
        $password = $request->input('password');
        $classroom_id = $request->input('classroom_id');

        $isStudentCreated =  $this->userService->createStudents($emails, $password, $classroom_id);
        if ($isStudentCreated) {
            return response()->json(["message" => "Create students success"]);
        }
        return response()->json(["message" => "Create students failed"], 400);
    }
}
