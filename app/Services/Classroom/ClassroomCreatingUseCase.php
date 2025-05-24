<?php
namespace App\Services\Classroom;

use App\Models\Semester;
use App\Repositories\Interfaces\ClassroomRepositoryInterface;
use App\Repositories\Interfaces\SemesterRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClassroomCreatingUseCase
{
    protected ClassroomRepositoryInterface $classroomRepository;
    protected SemesterRepositoryInterface $semesterRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository, SemesterRepositoryInterface $semesterRepository)
    {
        $this->classroomRepository = $classroomRepository;
        $this->semesterRepository = $semesterRepository;
    }

    public function execute($className, $semesters)
    {
        DB::beginTransaction();
        try {
            $classroom = $this->classroomRepository->create($className);
            foreach ($semesters as $semester) {
                $semester["classroom_id"] = $classroom->id;
                $this->semesterRepository->create($semester);
            }
            DB::commit();
            } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}