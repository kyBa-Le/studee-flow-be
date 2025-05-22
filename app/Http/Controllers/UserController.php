<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAllTeachers(Request $request)
    {
        $size = $request->size;
        if ($size == null) {
            $teachers = $this->userService->findAllUsersByRole("teacher");
        } else {
            $teachers = $this->userService->findAllUsersByRoleWithPagination("teacher", $size);
        }
        return response()->json($teachers);
    }

    public function createUser(CreateUserRequest $request)
    {
        $user = $request->toArray();
        $response = $this->userService->createUser($user);
        if (!$response) {
            return response()->json(['message' => 'User creation failed'], 400);
        }
        return response()->json(['message' => 'User created successfully'], 200);
    }

    public function createStudents(Request $request)
    {
        $emails = $request->input('emails');
        $password = $request->input('password');
        $classroom_id = $request->input('classroom_id');

        $isStudentCreated =  $this->userService->createStudents($emails, $password, $classroom_id);
        if ($isStudentCreated) {
            return response()->json(["message" => "Create students success"]);
        }
        return response()->json(["message" => "Create students failed"], 400);
    }

    public function getAllStudents()
    {
        $students = $this->userService->findAllUsersByRole('student');
        return response()->json($students);
    }

     public function getAllStudentsByClassroomId($classroom_id) {
        $students = $this->userService-> getAllStudentsByClassroomId($classroom_id);
        return response()->json($students);
    }

    public function updateStudentByAdmin(Request $request, $id)
    {
        $user = $this->userService->findUserById($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $data = $request->only(['email', 'full_name', 'password', 'student_classroom_id', 'gender']);
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $updated = $this->userService->updateUser($user, $data);
        if (!$updated) {
            return response()->json(['message' => 'Update failed'], 400);
        }
        return response()->json(['message' => 'User updated successfully']);
    }

    public function studentUpdateProfile(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $data = $request->only(['full_name', 'password', 'gender']);
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $updated = $this->userService->updateUser($user, $data);
        if (!$updated) {
            return response()->json(['message' => 'Update failed'], 400);
        }
        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function deleteUser($id)
    {
        $user = $this->userService->findUserById($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $deleted = $this->userService->deleteUser($user);
        if (!$deleted) {
            return response()->json(['message' => 'Delete failed'], 400);
        }
        return response()->json(['message' => 'User deleted successfully']);
    }
}
