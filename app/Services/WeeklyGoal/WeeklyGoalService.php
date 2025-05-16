<?php
namespace App\Services\WeeklyGoal;

use App\Models\WeeklyGoal;
use App\Repositories\Interfaces\WeeklyGoalRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WeeklyGoalService
{
    protected WeeklyGoalRepositoryInterface $weeklyGoalRepository;

    public function __construct(WeeklyGoalRepositoryInterface $weeklyGoalRepository)
    {
        $this->weeklyGoalRepository = $weeklyGoalRepository;
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

    public function update($id, array $data)
    {
        return $this->weeklyGoalRepository->update($id, $data);
    }
}
