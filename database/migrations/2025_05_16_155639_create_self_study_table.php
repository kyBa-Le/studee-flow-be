<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelfStudyTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('self_study', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('week_id')->nullable();

            $table->date('date');
            $table->text('lesson')->nullable();
            $table->string('time_allocation')->nullable(); // in minutes, perhaps
            $table->text('learning_resources')->nullable();
            $table->text('learning_activities')->nullable();
            $table->tinyInteger('concentration')->nullable(); // assuming scale e.g. 1-3
            $table->boolean('is_follow_plan')->default(false);
            $table->text('evaluation')->nullable();
            $table->text('reinforcing_learning')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null');
            $table->foreign('week_id')->references('id')->on('weeks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_study');
    }
}
