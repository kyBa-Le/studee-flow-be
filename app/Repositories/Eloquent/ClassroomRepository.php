<?php
namespace App\Repositories\Eloquent;

use App\Models\Classroom;
use App\Repositories\Interfaces\ClassroomRepositoryInterface;

class ClassroomRepository implements ClassroomRepositoryInterface
{
    public function getAllByTeacherId($id): array
    {
        return Classroom::whereHas('teachers', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->get()->toArray();
    }

    public function getAll() {
        return Classroom::all();
    }
}
