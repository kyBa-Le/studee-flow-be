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

    public function update($id, $newInClass, $studentId)
    {
        $inClass = $this->inClassRepository->getById($id);

        if ($inClass && $inClass->student_id == $studentId) {
            return $this->inClassRepository->update($id, $newInClass);
        } else {
            throw new \Exception("You don't have permission to update in class");
        }
    }


    public function getInClassJournalByStudentId(int $studentId, int $weekId)
    {
        return $this->inClassRepository->getByStudentIdAndWeekId($studentId, $weekId);
    }

}
