<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestGetStudentActivity;
use App\Services\Week\WeekService;
use Illuminate\Http\Request;

class WeekController extends Controller
{
    protected WeekService $weekService;

    public function __construct(WeekService $weekService)
    {
        $this->weekService = $weekService;
    }

    public function getAllWeeks(RequestGetStudentActivity $request, $id)
    {
        $weeks = $this->weekService->getAllWeeksByStudentId($id);
        return response()->json($weeks);
    }

    public function createWeek(Request $request)
    {
        $week["start_date"] = $request->get("start_date");
        $week["end_date"] = $request->get("end_date");
        $week["week"] = $request->get("week_number");
        $week["student_id"] = $request->user()->id;
        try {
            $this->weekService->createWeek($week);
            return response()->json(["message" => "Week created"]);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 400);
        }
    }

    public function updateWeek(Request $request, $id) 
    {
        $userId = $request->user()->id;
        $data = $request->all();
        $weekId = $id;
        $data["student_id"] = $userId;
        $week = $this->weekService->updateWeek($weekId, $data);
        return response()->json($week);
    }
}
