<?php
namespace App\Repositories\Eloquent;

use App\Models\Subject;
use App\Repositories\Interfaces\SubjectRepositoryInterface;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function getAllByClassroomId($id): array
    {
        return Subject::where('classroom_id', $id)->get()->toArray();
    }
}