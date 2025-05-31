<?php

namespace App\Jobs;

use App\Models\Deadline;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class HandleDeadlineJob implements ShouldQueue
{
    use Queueable;

    private Deadline $deadline;
    public function __construct(Deadline $deadline)
    {
        $this->deadline = $deadline;
    }

    public function handle(): void
    {
        Log::info("Deadline handled: {$this->deadline}");
        Log::info("Your deadline handled at: " . Carbon::now());
    }
}
