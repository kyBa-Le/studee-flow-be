<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commenter_id');
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->text('content');
            $table->enum("field", ["difficulties", "plan", "lesson", ""]);
            $table->enum("type", ["in_class", "self_study", ""]);
            $table->float("relative_x");
            $table->float("relative_y");
            $table->unsignedBigInteger("in_class_id")->nullable();
            $table->unsignedBigInteger("self_study_id")->nullable();
            $table->timestamps();

            $table->foreign('commenter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('self_study_id')->references('id')->on('self_study')->onDelete('cascade');
            $table->foreign('in_class_id')->references('id')->on('in_class')->onDelete('cascade');

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
