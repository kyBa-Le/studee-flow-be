<?php
namespace App\Services\Classroom;

use App\Repositories\Interfaces\ClassroomRepositoryInterface;

class ClassroomService
{
    protected ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository= $classroomRepository;
    }

    public function getAllClassroomByTeacherId ($id)
    {
        return $this->classroomRepository->getAllByTeacherId($id);
    }

    public function getAllClassrooms () {
        return $this->classroomRepository->getAll();
    }

    public function getTeachersByClassroomId($classroom_id)
    {
        return $this->classroomRepository->findAllByClassroomId($classroom_id);
    }

    public function addTeacher(String $id, String  $teacherId)
    {
        $classroom = $this->classroomRepository->findByTeacherIdAndClassroomId($id, $teacherId);
        if (!$classroom) {
            return $this->classroomRepository->addTeacher($id, $teacherId);
        }
        abort(400, "Teacher already in this classroom");
    }

    public function deleteTeacher(String $id, String $teacherId)
    {
        return $this->classroomRepository->deleteTeacher($id, $teacherId);
    }

}
