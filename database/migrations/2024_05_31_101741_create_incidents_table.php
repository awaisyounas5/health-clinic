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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->date('incident_date')->nullable();
            $table->time('incident_time')->nullable();
            $table->string('incident_people')->nullable();
            $table->string('position_of_reporter')->nullable();
            $table->string('location')->nullable();
            $table->string('name_of_reporter')->nullable();
            $table->text('incident_details')->nullable();
            $table->string('severity_incident')->nullable();
            $table->string('type_of_incident')->nullable();
            $table->string('possible_trigger')->nullable();
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
        Schema::dropIfExists('incidents');
    }
};
