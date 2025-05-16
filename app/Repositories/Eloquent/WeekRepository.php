<?php
namespace App\Repositories\Eloquent;

use App\Models\Week;
use App\Repositories\Interfaces\WeekRepositoryInterface;

class WeekRepository implements WeekRepositoryInterface
{
    public function getAllWeeks(): array
    {
        return Week::all()->toArray();
    }
}
