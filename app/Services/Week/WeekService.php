<?php
namespace App\Services\Week;

use App\Repositories\Interfaces\WeekRepositoryInterface;

class WeekService 
{
    protected WeekRepositoryInterface $weekRepository;

    public function __construct(WeekRepositoryInterface $weekRepository)
    {
        $this->weekRepository = $weekRepository;
    }
    
    public function getAllWeeks() 
    {
        return $this->weekRepository->getAllWeeks();
    }
}