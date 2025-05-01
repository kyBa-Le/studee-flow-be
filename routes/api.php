<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\AchievementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/user/tasks', [TaskController::class, "getAllByStudentId"]);
Route::get('/user/achievements', [AchievementController::class, "getAllByStudentId"]);
