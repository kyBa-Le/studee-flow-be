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

    public function getAllTeachers(Request $request) {
        $size = $request->size;
        if ($size == null) {
            $teachers = $this->userService->findAllUsersByRole("teacher");
        } else {
            $teachers = $this->userService->findAllUsersByRoleWithPagination("teacher", $size);
        }
        return response()->json($teachers);
    }
}
