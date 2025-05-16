<?php

namespace App\Repositories\Eloquent;

use App\Models\SelfStudy;
use App\Repositories\Interfaces\SelfStudyRepositoryInterface;

class SelfStudyRepository implements SelfStudyRepositoryInterface
{
    public function getByStudentIdAndWeekId(int $studentId, int $weekId)
    {
        return SelfStudy::all()->where('user_id', $studentId)->where('week_id', $weekId);
    }

    public function update(int $id, $newSelfStudy)
    {
        $old = SelfStudy::where('id', $id)->first();
        return $old->update($newSelfStudy);
    }
}
