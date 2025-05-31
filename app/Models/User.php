<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'full_name',
        'avatar_link',
        'email',
        'password',
        'role',
        'gender',
        'student_classroom_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role' => UserRole::class,
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'role' => $this->role
        ];
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'teachers_classrooms', 'teacher_id', 'classroom_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'student_classroom_id');
    }

    public function studentProgress()
    {
        return $this->hasOne(StudentProgress::class, 'student_id');
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'student_id');
    }

    public function weeks()
    {
        return $this->hasMany(Week::class, 'student_id');
    }

    public function weeklyGoals()
    {
        return $this->hasMany(WeeklyGoal::class,'student_id');
    }

    public function deadlineTracking()
    {
        return $this->hasOne(DeadlineTracking::class, 'student_id');
    }
}
