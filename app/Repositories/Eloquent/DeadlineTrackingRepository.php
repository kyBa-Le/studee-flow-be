<?php

namespace App\Repositories\Eloquent;

use App\Models\DeadlineTracking;
use App\Repositories\Interfaces\DeadlineTrackingRepositoryInterface;

class DeadlineTrackingRepository implements DeadlineTrackingRepositoryInterface
{

    public function create(array $data)
    {
        return DeadlineTracking::create($data);
    }
}
