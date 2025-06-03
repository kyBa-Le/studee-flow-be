<?php
namespace App\Services\WeeklyGoal;

use App\Models\WeeklyGoal;
use App\Repositories\Interfaces\WeeklyGoalRepositoryInterface;
use App\Services\StudentProgress\StudentProgressService;
use PHPUnit\Framework\Exception;

class WeeklyGoalService
{
    protected WeeklyGoalRepositoryInterface $weeklyGoalRepository;
    private StudentProgressService $studentProgressService;

    public function __construct(WeeklyGoalRepositoryInterface $weeklyGoalRepository, StudentProgressService $studentProgressService)
    {
        $this->weeklyGoalRepository = $weeklyGoalRepository;
        $this->studentProgressService = $studentProgressService;
    }

    public function create(array $data)
    {
        return WeeklyGoal::create([
            'student_id' => $data['student_id'],
            'week_id' => $data['week_id'],
            'goal' => $data['goal'],
            'is_achieved' => $data['is_achieved'] ?? false,
        ]);
    }

    public function getByStudentIdAndWeekId($studentId, $weekId)
    {
        return $this->weeklyGoalRepository->getByStudentIdAndWeekId($studentId, $weekId);
    }

    public function update($id, array $newWeeklyGoal, $studentId)
    {
        $weeklyGoal = $this->weeklyGoalRepository->findById($id);
        if (!$weeklyGoal || $weeklyGoal->student_id != $studentId) {
            throw new Exception("Weekly goal not found");
        }

        $updatedWeek = $this->weeklyGoalRepository->update($weeklyGoal, $newWeeklyGoal);
        $this->studentProgressService->updateWeeklyGoalCompletionRate($updatedWeek);
        return $updatedWeek;
    }

    public function delete(int $id, int $studentId): void
    {
        $weeklyGoal = $this->weeklyGoalRepository->findById($id);

        if (!$weeklyGoal || $weeklyGoal->student_id != $studentId) {
            throw new \Exception("Weekly Goal not found or unauthorized.");
        }

        $weeklyGoal->delete();
    }
}
