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
        Schema::create('shift_findings', function (Blueprint $table) {
            $table->id();
            $table->string('additional_findings')->nullable();
            $table->foreignId('shift_id')->references('id')->on('shifts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_findings');
    }
};
