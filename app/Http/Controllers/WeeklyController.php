<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeeklyRequest;
use App\Services\WeeklyGoal\WeeklyGoalService;
use Illuminate\Http\Request;

class WeeklyController extends Controller
{
    protected WeeklyGoalService $service;

    public function __construct(WeeklyGoalService $service)
    {
        $this->service = $service;
    }

    public function createWeekly(CreateWeeklyRequest $request)
    {
        $data = $request->validated();
        $entity = $this->service->create($data);
        return response()->json($entity, 201);
    }

    public function getWeeklyGoalsByStudentIdAndWeekId(Request $request)
    {
        $studentId = $request->user()->id;
        $weekId = $request->get('week_id');
        $entity = $this->service->getByStudentIdAndWeekId($studentId, $weekId);
        return response()->json($entity, 200);
    }

    public function updateWeekly(Request $request, int $id)
    {
        $data = $request->only(['goal', 'is_achieved']);
        $updated = $this->service->update($id, $data);
        return response()->json($updated, 200);
    }
}
