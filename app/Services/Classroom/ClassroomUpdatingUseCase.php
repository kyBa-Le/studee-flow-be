<?php
namespace App\Services\Classroom;

use App\Models\Semester;
use App\Repositories\Interfaces\ClassroomRepositoryInterface;
use App\Repositories\Interfaces\SemesterRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClassroomUpdatingUseCase
{
    protected ClassroomRepositoryInterface $classroomRepository;
    protected SemesterRepositoryInterface $semesterRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository, SemesterRepositoryInterface $semesterRepository)
    {
        $this->classroomRepository = $classroomRepository;
        $this->semesterRepository = $semesterRepository;
    }

    public function execute(array $classroomData, array $semestersData)
    {
        DB::beginTransaction();
        try {
            $classroom = $this->classroomRepository->update(
                $classroomData['id'],
                ['class_name' => $classroomData['class_name']]
            );

            foreach ($semestersData as $semester) {
                
                if (isset($semester['id'])) {
                    $this->semesterRepository->update($semester['id'], $semester);
                } else {
                    $semester["classroom_id"] = $classroomData['id'];
                    $this->semesterRepository->create($semester);
                }
            }

            DB::commit();
            return $classroom;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}