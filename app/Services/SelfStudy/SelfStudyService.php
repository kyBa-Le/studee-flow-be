<?php

namespace App\Services\SelfStudy;

use App\Repositories\Interfaces\SelfStudyRepositoryInterface;
use PHPUnit\Framework\Exception;

class SelfStudyService
{
    protected $selfStudyRepository;

    public function __construct(SelfStudyRepositoryInterface $selfStudyRepository) {
        $this->selfStudyRepository = $selfStudyRepository;
    }

    public function getSelfStudyJournalByStudentIdAndWeekId(int $studentId, int $weekId) {
        return $this->selfStudyRepository->getByStudentIdAndWeekId($studentId, $weekId);
    }

    public function update($id, $newSelfStudy, $studentId)
    {
        $selfStudy = $this->getSelfStudyJournalByStudentIdAndWeekId($studentId, $id);

        if ($selfStudy) {
            return $this->selfStudyRepository->update($id ,$newSelfStudy);
        } else {
            throw new Exception("You don't have permission to update self study");
        }
    }

    public function create($selfStudyData, $studentId)
    {
        $selfStudyData['student_id'] = $studentId;
        return $this->selfStudyRepository->create($selfStudyData);
    }

}
