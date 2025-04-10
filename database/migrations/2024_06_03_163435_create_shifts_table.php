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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('payrate_id')->references('id')->on('pay_rates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('shift_type_id')->references('id')->on('shift_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('background_color')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->enum('status',['A','D','in_progress','complete'])->default('D');
            $table->string('extra_shift_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
