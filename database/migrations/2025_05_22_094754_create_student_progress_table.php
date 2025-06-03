<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->unique();
            $table->float('completion_rate_weekly')->nullable()->default(0);
            $table->float('deadline_completion_rate')->nullable()->default(0);
            $table->text('learning_journal_feedback')->nullable();
            $table->timestamps();

            $table->foreign("student_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_progress');
    }
};
