<?php
namespace App\Repositories\Interfaces;

use App\Models\Classroom;

interface ClassroomRepositoryInterface
{
    public function getAllByTeacherId($id): array;

    public function create(array $data);

    public function update(int $id, $newClassroom);

    public function getAll();

    public function findAllByClassroomId($classroom_id);

    public function create(array $data);

    public function update(int $id, $newClassroom);

     public function delete(int $id);
}
