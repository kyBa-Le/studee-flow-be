<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
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
            $userId = $request->user()->id;
            $request->merge(['student_id' => $userId]);
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

    public function getSemesterGoalsByStudentId($id, Request $request)
    {
        $user = $request->user();

        if (
            $user->id !== (int) $id &&
            !in_array($user->role, [UserRole::Teacher, UserRole::Admin])
        ) {
            return response()->json([
                "message" => "You don't have permission to access this page"
            ], 403);
        }

        $semesterId = $request->get('semester_id');
        $goals = $this->semesterGoalService->getSemesterGoalsByStudentId($id, $semesterId);

        return response()->json($goals);
    }

}
