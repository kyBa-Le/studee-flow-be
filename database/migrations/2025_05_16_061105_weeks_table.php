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
        $table->unsignedBigInteger('classroom_id');
        $table->integer('week');
        $table->date('start_date');
        $table->date('end_date');
        $table->timestamps();

        $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('weeks');
    }
};
