<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSemesterGoalRequest;
use App\Services\SemesterGoal\SemesterGoalService;
use Illuminate\Http\Request;

class SemesterGoalController extends Controller
{
    protected SemesterGoalService $semesterGoalService;

    public function __construct(SemesterGoalService $semesterGoalService)
    {
        $this->semesterGoalService = $semesterGoalService;
    }

    public function createSemesterGoal(Request $request)
    {
        try {
            $data = $request->all();
            $data['student_id'] = $request->user()->id;

            $newGoal = $this->semesterGoalService->create($data);

            return response()->json([
                'user_id' => $newGoal->student_id,
                'semester_id' => $newGoal->semester_id,
                'data' => [
                    [
                        'module' => $newGoal->module,
                        'goal' => $newGoal->goals,
                        'is_achieved' => $newGoal->is_achieved,
                    ]
                ]
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create semester goal',
                'message' => $e->getMessage(),
            ], 500); 
        }
    }
}
