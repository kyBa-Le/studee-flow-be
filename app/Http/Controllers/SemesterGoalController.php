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
            $newGoal = $this->semesterGoalService->create($request->all());
             return response()->json([
            'message' => 'Semester goal created successfully!',
            'data' => $newGoal
        ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create semester goal',
                'message' => $e->getMessage(),
            ], 500); 
        }
    }

    public function updateSemesterGoal(Request $request, $id)
    {
        try {
            $student_id = $request->user()->id;
            $request->merge(['student_id' => $student_id]);
            
            $updatedGoal = $this->semesterGoalService->update($id, $request->all());
            return response()->json([
                'message' => 'Semester goal updated successfully!',
                'data' => $updatedGoal
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update semester goal',
                'message' => $e->getMessage(),
            ], 500); 
        }
    }
}
