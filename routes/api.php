<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SemesterGoalController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\InClassController;
use App\Http\Controllers\StudentProgressController;
use App\Models\InClass;
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

Route::get("/classroom/{id}/subjects", [SubjectController::class, "getAllByClassroomId"])->middleware(['auth:api', 'role:student,teacher' ]);

Route::get("/classroom/{id}/current-semester", [SemesterController::class, "getCurrentSemesterByClassroomId"])->middleware(['auth:api']);

Route::get("/student/semester-goals", [SemesterGoalController::class, "getSemesterGoalsByStudentId"])->middleware(['auth:api', 'role:student']);

Route::get("/student/in-classes", [InClassController::class, "getInClassJournalByStudentId"])->middleware(['auth:api', 'role:student']);

Route::get('/classroom/{id}/students', [UserController::class, 'getAllStudentsByClassroomId'])->middleware(['auth:api', 'role:teacher']);

Route::get('/student/{id}/progress', [StudentProgressController::class, 'getStudentProgressByStudentId'])->middleware(['auth:api', 'role:teacher']);

// POST
Route::post('/login', [AuthController::class, 'login']);

Route::post("/users", [UserController::class, "createUser"])->middleware(["auth:api", "role:admin"]);

Route::post("/students/bulk", [UserController::class, "createStudents"])->middleware(["auth:api", "role:admin"]);

Route::post('/student/semester-goals', [SemesterGoalController::class, 'createSemesterGoal'])->middleware(['auth:api', 'role:student']);

Route::post('/student/in-classes', [InClassController::class, 'createInClassJournal'])->middleware(['auth:api', 'role:student']);

// PUT
Route::put('/student/semester-goals/{id}', [SemesterGoalController::class, 'updateSemesterGoal'])->middleware(['auth:api', 'role:student']);

Route::put('/student/in-classes/{id}', [InClassController::class, 'updateInClassJournal'])->middleware(['auth:api', 'role:student']);

// DELETE


