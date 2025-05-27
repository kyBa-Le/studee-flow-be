<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestGetStudentActivity;
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
            $student_id = $request->user()->id;
            $request->merge(['student_id' => $student_id]);

            $newInClass = $this->inClassService->create($request->all());
            return response()->json([
                'message' => 'In class journal created successfully!',
                'inClassId' => $newInClass->id
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create in class journal',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateInClass($id)
    {
        $studentId = request()->user()->id;
        $data = request()->all();
        $data['student_id'] = $studentId;

        try {
            $response = $this->inClassService->update($id, $data, $studentId);
            return response()->json(["message" => "In Class has been updated"]);
        } catch (\Throwable $exception) {
            return response()->json(["message" => "Failed to update in class journal"], 400);
        }
    }


    public function getInClassJournalByStudentId($id, RequestGetStudentActivity $request) {
       try {
           $weekId = $request->get('week_id');
           $currentInClass = $this->inClassService->getInClassJournalByStudentId( $id, $weekId );
           return response()->json($currentInClass);
       } catch (\Throwable $exception) {
           throw $exception;
       }
    }
}
