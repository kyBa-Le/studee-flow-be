<?php
namespace App\Services\StudentProgress;

use App\Models\WeeklyGoal;
use App\Repositories\Interfaces\StudentProgressRepositoryInterface;
use Illuminate\Support\Facades\Log;

class StudentProgressService
{
    protected StudentProgressRepositoryInterface $studentProgressRepository;

    public function __construct(StudentProgressRepositoryInterface $studentProgressRepository)
    {
        $this->studentProgressRepository = $studentProgressRepository;
    }
    public function getStudentProgressByStudentId($student_id): array
    {
        return $this->studentProgressRepository->getStudentProgressByStudentId($student_id);
    }

    public function updateWeeklyGoalCompletionRate(WeeklyGoal $weeklyGoal)
    {
        $weeklyGoals = $weeklyGoal->student->weeklyGoals;
        $achievedCount = $weeklyGoals->where("is_achieved", true)->count();
        $totalCount = $weeklyGoals->count();

        $rate = $totalCount > 0 ? round(($achievedCount / $totalCount) * 100, 2) : 0;

        return $weeklyGoal->student->studentProgress->update(["completion_rate_weekly" => $rate]);
    }
}
