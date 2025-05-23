<?php

namespace App\Http\Controllers;

use App\Services\Achievement\AchievementService;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    protected AchievementService $achievementService;

    public function __construct(AchievementService $achievementService)
    {
        $this->achievementService = $achievementService;
    }

    public function getAllAchievementsByStudentId (Request $request)
    {
        $userId = $request->user()->id;
        $achievements = $this->achievementService->getAllAchievementsByStudentId($userId);
        return response()->json($achievements);
    }

        public function getAchievementsByStudentId(Request $request, $id)
    {
        $achievements = $this->achievementService->getAllAchievementsByStudentId($id);
        return response()->json($achievements);
    }
}
