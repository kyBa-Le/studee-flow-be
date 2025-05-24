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
}
