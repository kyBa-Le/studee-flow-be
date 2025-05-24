<?php

namespace App\Http\Controllers;

use App\Services\Classroom\CreateClassroomUseCase;
use App\Services\Classroom\ClassroomService;
use App\Services\Classroom\UpdateClassroomUseCase;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    protected $classroomService;
    protected CreateClassroomUseCase $createClassroomUseCase;
    protected UpdateClassroomUseCase $updateClassroomUseCase;

    public function __construct(ClassroomService $classroomService,
                                CreateClassroomUseCase $createClassroomUseCase,
                                UpdateClassroomUseCase $updateClassroomUseCase)
    {
        $this->createClassroomUseCase = $createClassroomUseCase;
        $this->classroomService = $classroomService;
        $this->updateClassroomUseCase = $updateClassroomUseCase;
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
        $classroom = $request->classroom;
        $semesters = $request->semesters;
        $this->createClassroomUseCase->execute( $classroom, $semesters);
        return response()->json(["message" => "Create class successful"]);
    }

    public function updateClassroom($id, Request $request)
    {
        $classroomData = $request->classroom;
        $classroomData['id'] = $id;
        $semesters = $request->semesters ?? [];
        $this->updateClassroomUseCase->execute($classroomData, $semesters);
        return response()->json(["message" => "Update classroom successful"]);
        try {
            $className = $request->input('class_name');
            $result = $this->classroomService->createClassroom($className);

            return response()->json(["message" => "Classroom created successfully", "data" => $result]);
        } catch (\Exception $e) {
            return response()->json(["message" => "Failed to create classroom: " . $e->getMessage()], 400);
        }
    }

    public function updateClassroom(Request $request)
    {
        try {
            $classroomId = $request->input('id');
            $newClassName = $request->input('class_name');

            $result = $this->classroomService->updateClassroom($classroomId, $newClassName);

            if ($result) {
                return response()->json(["message" => "Classroom updated successfully"]);
            }
            return response()->json(["message" => "Classroom not found"], 404);
        } catch (\Exception $e) {
            return response()->json(["message" => "Failed to update classroom"], 400);
        }
    }

    public function deleteClassroom(Request $request)
    {
        try {
            $classroomId = $request->input('id');
            $result = $this->classroomService->deleteClassroom($classroomId);

            if ($result) {
                return response()->json(["message" => "Classroom deleted successfully"]);
            }
            return response()->json(["message" => "Classroom not found"], 404);
        } catch (\Exception $e) {
            return response()->json(["message" => "Failed to delete classroom"], 400);
        }
    }

    public function getTeachersByClassroomId($classroom_id) {
        $users = $this->classroomService->getTeachersByClassroomId($classroom_id);
        return response()->json($users);
    }
}
