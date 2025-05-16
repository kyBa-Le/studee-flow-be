<?php

namespace App\Repositories\Eloquent;

use App\Models\SelfStudy;
use App\Repositories\Interfaces\SelfStudyRepositoryInterface;

class SelfStudyRepository implements SelfStudyRepositoryInterface
{
    public function getByStudentIdAndWeekId(int $studentId, int $weekId)
    {
        return SelfStudy::where('student_id', $studentId)->where('week_id', $weekId)->get();
    }

    public function update(int $id, $newSelfStudy)
    {
        $old = SelfStudy::where('id', $id)->first();
        return $old->update($newSelfStudy);
    }

    public function create(array $selfStudyData)
    {
        return SelfStudy::create($selfStudyData);
    }

}
