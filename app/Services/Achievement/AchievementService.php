<?php
namespace App\Services\Achievement;

use App\Repositories\Interfaces\AchievementRepositoryInterface;

class AchievementService 
{
    protected AchievementRepositoryInterface $achievementRepository;

    public function __construct(AchievementRepositoryInterface $achievementRepository)
    {
        $this->achievementRepository= $achievementRepository;
    }
    
    public function getAllAchievementsByStudentId ($id) 
    {
        return $this->achievementRepository->getAllByStudentId($id);
    }

    public function createAchievementByStudentId($data) {
        return $this->achievementRepository->createAchievementByStudentId($data);
    }
}