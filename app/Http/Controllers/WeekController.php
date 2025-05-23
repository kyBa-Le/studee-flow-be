<?php

namespace App\Http\Controllers;

use App\Services\Week\WeekService;
use Illuminate\Http\Request;

class WeekController extends Controller
{
    protected WeekService $weekService;

    public function __construct(WeekService $weekService)
    {
        $this->weekService = $weekService;
    }

    public function getAllWeeks(Request $request)
    {
        $weeks = $this->weekService->getAllWeeks();
        return response()->json($weeks);
    }
}
