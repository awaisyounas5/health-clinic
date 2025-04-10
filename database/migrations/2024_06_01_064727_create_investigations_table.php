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
        Schema::create('investigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id')->references('id')->on('incidents')->onDelete('cascade');
            $table->date('investigation_date')->nullable();
            $table->time('investigation_time')->nullable();
            $table->string('people_involved')->nullable();
            $table->string('position_of_investigator')->nullable();
            $table->string('location')->nullable();
            $table->string('name_of_investigator')->nullable();
            $table->text('incident_details')->nullable();
            $table->string('result_of_investigation')->nullable();
            $table->string('recommendation')->nullable();
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
        Schema::dropIfExists('investigations');
    }
};
