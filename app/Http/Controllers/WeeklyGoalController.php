<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeeklyRequest;
use App\Http\Requests\RequestGetStudentActivity;
use App\Services\WeeklyGoal\WeeklyGoalService;
use Illuminate\Http\Request;
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

    public function getWeeklyGoalsByStudentIdAndWeekId($id, RequestGetStudentActivity $request)
    {
        $weekId = $request->get('week_id');
        $entity = $this->service->getByStudentIdAndWeekId($id, $weekId);
        return response()->json($entity, 200);
    }

    public function updateWeeklyGoal(Request $request, int $id)
    {

        $data = $request->validate([
            'goal' => 'nullable|string',
            'is_achieved' => 'sometimes|boolean',
        ]);

        $data = array_filter($data, function ($value) {
            return !is_null($value);
        });

        try {
            $studentId = $request->user()->id;
            $updated = $this->service->update($id, $data, $studentId);
            return response()->json($updated, 200);
        } catch (Throwable $e) {
            Throw $e;
        }
    }

    public function destroyWeeklyGoal(Request $request, int $id)
    {
        try {
            $studentId = $request->user()->id;
            $this->service->delete($id, $studentId);
            return response()->json(null, 204);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
