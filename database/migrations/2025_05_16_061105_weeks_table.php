<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
       Schema::create('weeks', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->integer('week');
        $table->date('start_date');
        $table->date('end_date');
        $table->string('status')->default('created');
        $table->timestamps();

        $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('weeks');
    }
};
