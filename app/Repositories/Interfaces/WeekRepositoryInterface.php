<?php
namespace App\Repositories\Interfaces;

interface WeekRepositoryInterface
{
    public function getAllWeeksByStudentId($studentId): array;

    public function createWeek($week);
}
