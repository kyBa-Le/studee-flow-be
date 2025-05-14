<?php

namespace App\Services\SemesterGoal;

use App\Repositories\Interfaces\SemesterGoalRepositoryInterface;

class SemesterGoalService
{
    protected SemesterGoalRepositoryInterface $semesterGoalRepo;

    public function __construct(SemesterGoalRepositoryInterface $semesterGoalRepo)
    {
        $this->semesterGoalRepo = $semesterGoalRepo;
    }

    public function create(array $data)
    {
        return $this->semesterGoalRepo->create($data);
    }
}

