<?php
namespace App\Services\Week;

use App\Repositories\Interfaces\WeekRepositoryInterface;

class WeekService
{
    protected WeekRepositoryInterface $weekRepository;

    public function __construct(WeekRepositoryInterface $weekRepository)
    {
        $this->weekRepository = $weekRepository;
    }

    public function getAllWeeksByStudentId($studentId)
    {
        return $this->weekRepository->getAllWeeksByStudentId($studentId);
    }

    public function createWeek($week)
    {
        return $this->weekRepository->createWeek($week);
    }

    public function updateWeek($weekId, $data) 
    {
        return $this->weekRepository->updateWeek($weekId, $data);
    }
}
