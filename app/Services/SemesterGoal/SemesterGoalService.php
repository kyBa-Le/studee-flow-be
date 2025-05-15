<?php

namespace App\Services\SemesterGoal;

use App\Repositories\Interfaces\SemesterGoalRepositoryInterface;

class SemesterGoalService
{
    protected SemesterGoalRepositoryInterface $semesterGoalRepository;

    public function __construct(SemesterGoalRepositoryInterface $semesterGoalRepository)
    {
        $this->semesterGoalRepository = $semesterGoalRepository;
    }

    public function create(array $data)
    {
        return $this->semesterGoalRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->semesterGoalRepository->update($id, $data);
    }
}

