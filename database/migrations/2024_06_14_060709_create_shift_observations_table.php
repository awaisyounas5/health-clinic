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
        Schema::create('shift_observations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_id')->references('id')->on('shifts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('respiratory_rate')->nullable();
            $table->string('body_temperature')->nullable();
            $table->string('spo2_level')->nullable();
            $table->string('inspired_o2')->nullable();
            $table->string('blood_pressure_level')->nullable();
            $table->text('heart_beat_rate')->nullable();
            $table->text('concious_level')->nullable();
            $table->text('additional_notes')->nullable();
            $table->enum('status',['yes','no'])->default('yes');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_observations');
    }
};
