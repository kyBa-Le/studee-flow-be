<?php
namespace App\Repositories\Interfaces;

interface ClassroomRepositoryInterface
{
    public function getAllByTeacherId($id): array;

    public function create(array $data);

    public function update(int $id, $newClassroom);

    public function getAll();

    public function findAllByClassroomId($classroom_id);

    public function addTeacher(String $id, String  $teacherId);

    public function findByTeacherIdAndClassroomId($id, $teacherId);

    public function deleteTeacher(string $id, String $teacherId);

    public function getClassroomByClassroomId(int $id);
  
}
