<?php
namespace App\Repositories\Eloquent;

use App\Models\Classroom;
use App\Repositories\Interfaces\ClassroomRepositoryInterface;

class ClassroomRepository implements ClassroomRepositoryInterface
{
    public function getAllByTeacherId($id): array
    {
        return Classroom::with(["teachers:id"])->whereHas('teachers', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->get()->toArray();
    }

    public function getAll() {
        return Classroom::all();
    }

    public function create(array $data)
    {
        return Classroom::create($data);
    }

    public function update(int $id, $newClassroom)
    {
        $old = Classroom::where('id', $id)->first();
        return $old->update($newClassroom);
    }

    public function delete(int $id) {
        return Classroom::where('id', $id)->delete();
    }

    public function findAllByClassroomId($classroom_id): array
    {
        $classroom = Classroom::find($classroom_id);
        return $classroom->teachers->toArray();
    }
}
