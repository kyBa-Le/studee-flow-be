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

    public function createSubject(Request $request, $classroomId)
    {
        $subject = $request->all();
        $subject["classroom_id"] = $classroomId;
        $newSubject = $this->subjectService->createSubject($subject);
        return response()->json(["message" => "Subject created", "subject" => $newSubject], 201);
    }
}
