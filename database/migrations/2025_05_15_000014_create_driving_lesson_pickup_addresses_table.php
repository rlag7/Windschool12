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
        Schema::create('driving_lesson_pickup_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driving_lesson_id')->constrained('driving_lessons');
            $table->foreignId('pickup_address_id')->constrained('pickup_addresses');
            $table->boolean('is_active')->default(true);
            $table->text('note')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_lesson_pickup_addresses');
    }
};
