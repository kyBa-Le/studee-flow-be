<?php
namespace App\Services\Semester;

use App\Models\Semester;
use App\Repositories\Interfaces\SemesterRepositoryInterface;

class SemesterService
{
    protected SemesterRepositoryInterface $semesterRepository;

    public function __construct(SemesterRepositoryInterface $semesterRepository)
    {
        $this->semesterRepository = $semesterRepository;
    }
    public function getCurrentSemesterByClassroomId($id, $today): array
    {
        return $this->semesterRepository->getCurrentSemesterByClassroomId($id, $today);
    }
}
