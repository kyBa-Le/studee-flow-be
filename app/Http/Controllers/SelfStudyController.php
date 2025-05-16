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

        try {
            $response = $this->selfStudyService->update($id, $data, $studentId);
            return response()->json(["message" => "Self Study has been updated"]);
        } catch (\Throwable $exception) {
            return response()->json(["message" => "Failed to update self study journal"], 400);
        }
    }

}
