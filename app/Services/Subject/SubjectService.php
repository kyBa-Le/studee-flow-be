<?php
namespace App\Services\Subject;

use App\Models\Subject;
use App\Repositories\Interfaces\SubjectRepositoryInterface;

class SubjectService
{
    protected SubjectRepositoryInterface $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }
    public function getAllByClassroomId($id): array
    {
        return $this->subjectRepository->getAllByClassroomId($id);
    }

    public function createSubject($subject)
    {
        return $this->subjectRepository->createSubject($subject);
    }
}
