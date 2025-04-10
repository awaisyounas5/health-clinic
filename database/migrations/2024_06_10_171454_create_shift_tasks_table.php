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
        Schema::create('shift_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_id')->references('id')->on('shifts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('category_type')->nullable();
            $table->string('category_id')->nullable();
            $table->enum('status',['yes','no'])->default('yes');
            $table->string('reason_for_no')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_tasks');
    }
};
