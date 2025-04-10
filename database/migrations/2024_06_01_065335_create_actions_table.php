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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investigation_id')->references('id')->on('investigations')->onDelete('cascade');
            $table->date('action_date')->nullable();
            $table->time('action_time')->nullable();
            $table->date('time_of_completion')->nullable();
            $table->string('people_involved')->nullable();
            $table->string('location')->nullable();
            $table->string('position_of_action_lead')->nullable();
            $table->string('name_of_action_lead')->nullable();
            $table->string('action_plan')->nullable();
            $table->string('result_of_action')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status',['new','in_progress','completed'])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
