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
        Schema::create('risk_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('risk_level')->nullable();
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('activity_issue')->nullable();
            $table->string('hazards_identified')->nullable();
            $table->string('affected_persons')->nullable();
            $table->string('current_measures')->nullable();
            $table->string('further_measures')->nullable();
            $table->foreignId('responsible_staff_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('days_needed')->nullable();
            $table->string('review_time_frame')->nullable();
            $table->string('next_review_date')->nullable();
            $table->string('reminder_days')->nullable();
            $table->string('template_name')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_assessments');
    }
};
