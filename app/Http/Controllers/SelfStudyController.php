<?php

namespace App\Http\Controllers;

use App\Services\SelfStudy\SelfStudyService;

class SelfStudyController
{
    protected $selfStudyService;

    public function __construct(SelfStudyService $selfStudyService) {
        $this->selfStudyService = $selfStudyService;
    }

    public function getWeeklySelfStudyJournalOfStudent() {
        $studentId = request()->user()->id;
        $weekId = request()->input('week_id');

        $response = $this->selfStudyService->getSelfStudyJournalByStudentIdAndWeekId($studentId, $weekId);
        return response()->json($response);
    }

    public function updateSelfStudy($id)
    {
        $studentId = request()->user()->id;
        $data = request()->all();
        $data['student_id'] = $studentId;

        try {
            $response = $this->selfStudyService->update($id, $data, $studentId);
            return response()->json(["message" => "Self Study has been updated"]);
        } catch (\Throwable $exception) {
            return response()->json(["message" => "Failed to update self study journal"], 400);
        }
    }

    public function createSelfStudy()
    {
        $studentId = request()->user()->id;
        $data = request()->all();

        try {
            $response = $this->selfStudyService->create($data, $studentId);
            return response()->json([
                "message" => "Self Study has been created",
                "selfStudyId" => $response->id
            ], 201);
        } catch (\Throwable $exception) {
            throw $exception;
//            return response()->json(["message" => "Failed to create self study journal"], 400);
        }
    }


}
