<?php

namespace App\Services\Deadline;

use App\Repositories\Interfaces\DeadlineRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DeadlineService
{
    protected DeadlineRepositoryInterface $deadlineRepository;

    public function __construct(DeadlineRepositoryInterface $deadlineRepository)
    {
        $this->deadlineRepository = $deadlineRepository;
    }

    public function createDeadlines(array $deadlines, $classroomId): void
    {
        DB::beginTransaction();
        try {
            foreach ($deadlines as $deadline) {
                $deadline["classroom_id"] = $classroomId;
                $this->deadlineRepository->create($deadline);
            }
            DB::commit();
        } catch (\Throwable $e)
        {
            DB::rollBack();
            throw $e;
        }
    }

    public function getAllDeadlinesByClassroomId(int $classroomId): array
    {
        return $this->deadlineRepository->getAllByClassroomId($classroomId);
    }
}
