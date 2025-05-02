<?php
namespace App\Services\User;

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
}