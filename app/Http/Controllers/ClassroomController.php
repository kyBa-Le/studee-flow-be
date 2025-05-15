<?php

namespace App\Http\Controllers;

use App\Services\Classroom\ClassroomService;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    protected $classroomService;

    public function __construct(ClassroomService $classroomService)
    {
        $this->classroomService = $classroomService;
    }

    public function getAllClassroomByTeacherId(Request $request)
    {
        $teacher_id= $request->user()->id;
        $classrooms = $this->classroomService->getAllClassroomByTeacherId($teacher_id);
        return response()->json($classrooms);
    }

    public function getAllClassrooms() {
        $classrooms = $this->classroomService->getAllClassrooms();
        return response()->json($classrooms);
    }
}
