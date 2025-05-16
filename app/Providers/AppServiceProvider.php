<?php

namespace App\Providers;

use App\Models\Achievement;
use App\Models\SemesterGoal;
use App\Repositories\Eloquent\AchievementRepository;
use App\Repositories\Eloquent\ClassroomRepository;
use App\Repositories\Eloquent\SemesterGoalRepository;
use App\Repositories\Eloquent\TaskRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\WeeklyGoalRepository;
use App\Repositories\Eloquent\SubjectRepository;
use App\Repositories\Eloquent\SemesterRepository;
use App\Repositories\Interfaces\AchievementRepositoryInterface;
use App\Repositories\Interfaces\ClassroomRepositoryInterface;
use App\Repositories\Interfaces\SemesterGoalRepositoryInterface;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\WeeklyGoalRepositoryInterface;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Repositories\Interfaces\SemesterRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(UserRepositoryInterface::class, UserRepository::class);
        app()->bind(TaskRepositoryInterface::class, TaskRepository::class);
        app()->bind(AchievementRepositoryInterface::class, AchievementRepository::class);
        app()->bind(ClassroomRepositoryInterface::class, ClassroomRepository::class);
        app()->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        app()->bind(SemesterGoalRepositoryInterface::class, SemesterGoalRepository::class);
        app()->bind(SemesterRepositoryInterface::class, SemesterRepository::class);
        app()->bind(WeeklyGoalRepositoryInterface::class, WeeklyGoalRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
