<?php

namespace App\Services\SelfStudy;

use App\Repositories\Interfaces\SelfStudyRepositoryInterface;

class SelfStudyService
{
    protected $selfStudyRepository;

    public function __construct(SelfStudyRepositoryInterface $selfStudyRepository) {
        $this->selfStudyRepository = $selfStudyRepository;
    }

    public function getSelfStudyJournalByStudentIdAndWeekId(int $studentId, int $weekId) {
        return $this->selfStudyRepository->getByStudentIdAndWeekId($studentId, $weekId);
    }

}
