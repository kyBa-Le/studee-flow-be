<?php

namespace App\Jobs;

use App\Models\Deadline;
use App\Models\Week;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

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
        $students = $this->deadline->classroom->students;
        foreach ($students as $student) {
            $journal = Week::query()->where("student_id", $student->id)->where("status", "submitting")->first();

            $deadlineTracking = $student->deadlineTracking;
            if ($journal) {
                $deadlineTracking->increment('count_on_time');
                $journal->update(["status" => "submitted"]);
            } else {
                $deadlineTracking->increment('count_missing');
            }


            $studentProgress = $student->studentProgress;
            $total = $studentProgress->count_on_time + $studentProgress->count_missing;

            if ($total > 0) {
                $newRate = ($deadlineTracking->count_on_time / $total) * 100;
            } else {
                $newRate = 0;
            }

            $studentProgress->update(["deadline_completion_rate" => $newRate]);
        }
    }
}
