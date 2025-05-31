<?php

namespace App\Repositories\Eloquent;

use App\Models\Deadline;
use App\Repositories\Interfaces\DeadlineRepositoryInterface;

class DeadlineRepository implements DeadlineRepositoryInterface
{

    public function create(array $deadline): void
    {
        Deadline::create($deadline);
    }
}
