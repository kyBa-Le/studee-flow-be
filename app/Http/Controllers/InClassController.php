<?php

namespace App\Http\Controllers;

use App\Services\InClass\InClassService;
use Illuminate\Http\Request;

class InClassController extends Controller
{
    protected InClassService $inClassService;

    public function __construct(InClassService $inClassService)
    {
        $this->inClassService = $inClassService;
    }

    public function createInClassJournal(Request $request)
    {
        try {
            $userId = $request->user()->id;
            $request->merge(['user_id' => $userId]);
            $newInClass = $this->inClassService->create($request->all());
             return response()->json([
            'message' => 'In class journal created successfully!',
            'data' => $newInClass
        ], 201);
          
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create in class journal',
                'message' => $e->getMessage(),
            ], 500); 
        }
    }

    public function getInClassJournalByStudentId(Request $request) {
       $userId = $request->user()->id;
       $weekId = $request->get('week_id');

       $currentInClass = $this->inClassService->getInClassJournalByStudentId( $userId, $weekId );
       return response()->json($currentInClass);
    }
}
