<?php

namespace App\Http\Controllers;

use App\Services\Subject\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function getAllByClassroomId($id)
    {
        $subjects = $this->subjectService->getAllByClassroomId($id);
        return response()->json($subjects);
    }
}
