<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', function () {
    return response()->json(['message' => 'Unauthorized request'], 401);
})->name('login');

Route::get('/user/tasks', [TaskController::class, "getAllTasksByStudentId"])
    ->middleware(['auth:api', 'role:student']);

Route::get('/user/achievements', [AchievementController::class, "getAllAchievementsByStudentId"])
    ->middleware(['auth:api', 'role:student']);

Route::get('/user/teacher/classrooms', [ClassroomController::class, "getAllClassroomByTeacherId"])
->middleware(['auth:api', 'role:teacher']);

Route::get("/teachers", [UserController::class, "getAllTeachers"])->middleware(['auth:api', 'role:admin']);

Route::post("/users", [UserController::class, "createUser"])->middleware(["auth:api", "role:admin"]);