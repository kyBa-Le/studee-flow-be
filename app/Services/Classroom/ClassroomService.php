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
}