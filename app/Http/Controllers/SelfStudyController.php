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

}
