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

    public function createClassroom(Request $request)
    {
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
}
