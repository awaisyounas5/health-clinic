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
        Schema::create('audit_standards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_id')->references('id')->on('audits')->onDelete('cascade')->onUpdate('cascade');
            $table->string('standard')->nullable();
            $table->string('issues')->nullable();
            $table->string('resolved')->nullable();
            $table->enum('status',['in_progress','completed'])->default('in_progress');
            $table->string('additional_info')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_standards');
    }
};
