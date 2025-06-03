<?php

namespace App\Http\Controllers;

use App\Services\StudentProgress\StudentProgressService;
use Illuminate\Http\Request;

class StudentProgressController extends Controller
{
    protected $studentProgressService;

    public function __construct(StudentProgressService $studentProgressService)
    {
        $this->studentProgressService = $studentProgressService;
    }

    public function getStudentProgressByStudentId($student_id)
    {
        $studentProgress = $this->studentProgressService->getStudentProgressByStudentId($student_id);
        return response()->json($studentProgress);
    }
}
