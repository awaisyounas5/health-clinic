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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date');
            $table->time('time');
            $table->text('details')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
