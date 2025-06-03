<?php

namespace App\Repositories\Eloquent;

use App\Models\InClass;
use App\Repositories\Interfaces\InClassRepositoryInterface;

class InClassRepository implements InClassRepositoryInterface
{
    public function create(array $data)
    {
        return InClass::create($data);
    }

    public function update(int $id, $newInClass)
    {
        $old = InClass::where('id', $id)->first();
        return $old->update($newInClass);
    }


    public function getByStudentIdAndWeekId(int $studentId, int $weekId) {
        return InClass::where('student_id', $studentId)->where('week_id', $weekId)->get();
    }

    public function getById(int $id) {
        return InClass::query()->findOrFail($id);
    }
}
