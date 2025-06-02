<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\SystemVisitLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Enums\UserRole;
use Illuminate\Support\Facades\DB;

class SystemVisitLogController extends Controller
{
    public function logUserVisit(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Chống trùng lặp: chỉ ghi log nếu chưa có log nào trong 10 giây gần nhất
        $latestLog = SystemVisitLog::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($latestLog && $latestLog->created_at->diffInSeconds(now()) < 10) {
            return response()->json(['message' => 'User visit recently logged.'], 200);
        }

        SystemVisitLog::create([
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'User visit logged successfully.']);
    }

    public function getTeacherPerClass()
    {
        $data = Classroom::withCount('teachers')->get()->map(function ($classroom) {
            return [
                'class_id' => $classroom->id,
                'class_name' => $classroom->class_name,
                'teacher_count' => $classroom->teachers_count,
            ];
        });
        return response()->json($data);
    }

    public function getTotalVisitLogs()
    {
        $totalLogs = SystemVisitLog::count();
        return response()->json(['total' => $totalLogs]);
    }

    public function getUserVisitLogsByDay(Request $request)
    {
        $date = $request->input('date', now('Asia/Ho_Chi_Minh')->toDateString());
        if (!\DateTime::createFromFormat('Y-m-d', $date)) {
            return response()->json(['message' => 'Invalid date format. Use YYYY-MM-DD.'], 400);
        }

        $dateVN = Carbon::createFromFormat('Y-m-d', $date, 'Asia/Ho_Chi_Minh');
        $startUTC = $dateVN->copy()->startOfDay()->setTimezone('UTC');
        $endUTC = $dateVN->copy()->endOfDay()->setTimezone('UTC');

        $logs = SystemVisitLog::with('user')
            ->whereBetween('created_at', [$startUTC, $endUTC])
            ->get()
            ->filter(fn($log) => $log->user !== null)
            ->map(fn($log) => [
                'user_id' => $log->user_id,
                'full_name' => $log->user->full_name,
                'role' => $log->user->role,
                'created_at' => $log->created_at,
            ]);

        $teachers = $logs->where('role', 'teacher')->groupBy('user_id')->map(function ($items, $userId) {
            return [
                'user_id' => $userId,
                'full_name' => $items->first()['full_name'],
                'visit_count' => $items->count(),
            ];
        })->values();

        $students = $logs->where('role', 'student')->groupBy('user_id')->map(function ($items, $userId) {
            return [
                'user_id' => $userId,
                'full_name' => $items->first()['full_name'],
                'visit_count' => $items->count(),
            ];
        })->values();

        return response()->json([
            'teachers' => $teachers,
            'students' => $students,
            'total_teacher_visits' => $teachers->sum('visit_count'),
            'total_student_visits' => $students->sum('visit_count'),
        ]);
    }

    public function getUserVisitLogsByDateRange(Request $request)
    {
        $start = $request->input('start_date', now('Asia/Ho_Chi_Minh')->subDays(6)->toDateString());
        $end = $request->input('end_date', now('Asia/Ho_Chi_Minh')->toDateString());

        $logs = DB::table('system_visit_logs')
            ->join('users', 'system_visit_logs.user_id', '=', 'users.id')
            ->selectRaw("
                DATE(CONVERT_TZ(system_visit_logs.created_at, '+00:00', '+07:00')) as date,
                users.role,
                COUNT(*) as visit_count
            ")
            ->whereBetween('system_visit_logs.created_at', [
                Carbon::parse($start)->startOfDay()->timezone('UTC'),
                Carbon::parse($end)->endOfDay()->timezone('UTC')
            ])
            ->groupBy('date', 'users.role')
            ->orderBy('date')
            ->get();

        $dates = collect();
        $result = [];
        foreach ($logs as $log) {
            $dates->push($log->date);
        }
        $dates = $dates->unique()->sort()->values();

        foreach ($dates as $date) {
            $row = ['date' => $date, 'student_visits' => 0, 'teacher_visits' => 0];
            foreach ($logs as $log) {
                if ($log->date === $date) {
                    if ($log->role === 'student') $row['student_visits'] = $log->visit_count;
                    if ($log->role === 'teacher') $row['teacher_visits'] = $log->visit_count;
                }
            }
            $result[] = $row;
        }

        return response()->json($result);
    }
}
