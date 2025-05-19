<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeeklyRequest;
use App\Services\WeeklyGoal\WeeklyGoalService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Throw_;
use Throwable;

class WeeklyGoalController extends Controller
{
    protected WeeklyGoalService $service;

    public function __construct(WeeklyGoalService $service)
    {
        $this->service = $service;
    }

    public function createWeeklyGoal(CreateWeeklyRequest $request)
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

    public function updateWeeklyGoal(Request $request, int $id)
    {
        try {
            $studentId = $request->user()->id;

            $updated = $this->service->update($id, $request->toArray(), $studentId);
            return response()->json($updated, 200);
        } catch (Throwable $e) {
            Throw $e;
        }
    }
}
