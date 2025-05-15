<?php

namespace App\Http\Controllers;

use App\Services\Semester\SemesterService;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    protected $semesterService;

    public function __construct(SemesterService $semesterService)
    {
        $this->semesterService = $semesterService;
    }

    public function getCurrentSemesterByClassroomId($id)
    {   
        $today = date("Y-m-d");
        $semester = $this->semesterService->getCurrentSemesterByClassroomId($id, $today);
        return response()->json($semester);
    }
}
