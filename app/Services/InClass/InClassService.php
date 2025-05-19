<?php

namespace App\Services\InClass;

use App\Repositories\Interfaces\InClassRepositoryInterface;

class InClassService
{
    protected InClassRepositoryInterface $inClassRepository;

    public function __construct(InClassRepositoryInterface $inClassRepository)
    {
        $this->inClassRepository = $inClassRepository;
    }

    public function create(array $data)
    {
        return $this->inClassRepository->create($data);
    }

     public function update(int $id, array $data)
    {
        return $this->inClassRepository->update($id, $data);
    }

    public function getInClassJournalByStudentId(int $studentId, int $weekId)
    {
        return $this->inClassRepository->getByStudentIdAndWeekId($studentId, $weekId);
    }
}

