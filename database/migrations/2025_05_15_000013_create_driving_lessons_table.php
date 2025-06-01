<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driving_lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations');
            $table->foreignId('instructor_id')->constrained('instructors');
            $table->foreignId('car_id')->constrained('cars');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->string('lesson_status')->nullable();
            $table->string('goal')->nullable();
            $table->text('student_comment')->nullable();
            $table->text('instructor_comment')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('comment')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_lessons');
    }
};
