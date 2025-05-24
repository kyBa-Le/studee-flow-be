<?php

namespace App\Http\Controllers;

use App\Services\Classroom\ClassroomCreatingUseCase;
use App\Services\Classroom\ClassroomService;
use App\Services\Classroom\ClassroomUpdatingUseCase;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    protected $classroomService;
    protected ClassroomCreatingUseCase $classroomCreating;
    protected ClassroomUpdatingUseCase $classroomUpdating;

    public function __construct(ClassroomService $classroomService, ClassroomCreatingUseCase $classroomCreating, ClassroomUpdatingUseCase $classroomUpdating)
    {
        $this->classroomCreating = $classroomCreating;
        $this->classroomService = $classroomService;
        $this->classroomUpdating = $classroomUpdating;
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

    public function createClassroom(Request $request)
    {
        $className["class_name"] = $request->class_name;
        $semesters = $request->semesters;
        $this->classroomCreating->execute( $className, $semesters);
        return response()->json(["message" => "Create class successful"]);
    }

    public function updateClassroom($id, Request $request)
    {
        $classroomData = [
            'id' => $id,
            'class_name' => $request->class_name
        ];
        
        $semesters = $request->semesters ?? [];
        $this->classroomUpdating->execute($classroomData, $semesters);
        return response()->json(["message" => "Update classroom successful"]);
    }
  
    public function getTeachersByClassroomId($classroom_id) {
        $users = $this->classroomService->getTeachersByClassroomId($classroom_id);
        return response()->json($users);
    }
}
