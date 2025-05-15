<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// GET
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/login', function () {
    return response()->json(['message' => 'Unauthorized request'], 401);
})->name('login');

Route::get('/student/tasks', [TaskController::class, "getAllTasksByStudentId"])
->middleware(['auth:api', 'role:student']);

Route::get('/student/achievements', [AchievementController::class, "getAllAchievementsByStudentId"])
->middleware(['auth:api', 'role:student']);

Route::get('/teacher/classrooms', [ClassroomController::class, "getAllClassroomByTeacherId"])
->middleware(['auth:api', 'role:teacher']);

Route::get("/teachers", [UserController::class, "getAllTeachers"])->middleware(['auth:api', 'role:admin']);

Route::get("/students", [UserController::class, "getAllStudents"])->middleware(['auth:api', 'role:admin']);

Route::get("/classrooms", [ClassroomController::class, "getAllClassrooms"])->middleware(['auth:api', 'role:admin']);

// POST
Route::post('/login', [AuthController::class, 'login']);

Route::post("/users", [UserController::class, "createUser"])->middleware(["auth:api", "role:admin"]);

Route::post("/students/bulk", [UserController::class, "createStudents"])->middleware(["auth:api", "role:admin"]);

// PUT

// DELETE


