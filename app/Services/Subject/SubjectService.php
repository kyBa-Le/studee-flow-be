<?php
namespace App\Services\Subject;

use App\Models\Subject;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
}
