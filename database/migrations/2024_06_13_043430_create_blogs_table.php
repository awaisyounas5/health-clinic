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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('thumbnail')->nullable();
            $table->enum('status',['active','in_active'])->default('in_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
