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

    public function findAllByClassroomId($classroom_id): array
    {
        $classroom = Classroom::find($classroom_id);
        return $classroom->teachers->toArray();
    }
}
