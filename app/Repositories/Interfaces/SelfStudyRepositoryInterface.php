<?php

namespace App\Repositories\Interfaces;

interface SelfStudyRepositoryInterface
{
    public function getByStudentIdAndWeekId(int $studentId, int $weekId);
}
