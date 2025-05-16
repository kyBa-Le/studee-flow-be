<?php

namespace App\Repositories\Interfaces;

interface SelfStudyRepositoryInterface
{
    public function getByStudentIdAndWeekId(int $studentId, int $weekId);

    public function update(int $id, $newSelfStudy);
}
