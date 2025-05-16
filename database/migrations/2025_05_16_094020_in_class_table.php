<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
         Schema::create('in_class', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); 
            $table->date('date');
            $table->unsignedBigInteger('subject_id'); 
            $table->text('lesson');
            $table->enum('self_assessment', [1, 2, 3]); 
            $table->text('difficulties')->nullable();
            $table->text('plan')->nullable();
            $table->boolean('is_problem_solved')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('week_id')->nullable(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('week_id')->references('id')->on('weeks')->onDelete('set null');
        });

    }

    public function down(): void
    {
         Schema::dropIfExists('in_class');
    }
};
