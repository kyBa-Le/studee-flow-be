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

    public function update(int $id, array $data)
    {
        $inClass = InClass::where('id', $id)
            ->where('student_id', $data['student_id'])
            ->first();

        if (! $inClass) {
            throw new \Exception('In class Journal not found or does not belong to the student');
        }

         $inClass->update($data);

        return $inClass;
    }

    public function getByStudentIdAndWeekId(int $studentId, int $weekId) {
        return InClass::where('student_id', $studentId)->where('week_id', $weekId)->get();
    }
}
