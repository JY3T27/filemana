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
        Schema::create('filedatas', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_type');
            $table->bigInteger('file_size');
            $table->string('file_path');
            $table->foreignId('user_id')->constrained(); // Foreign key to the users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filedatas');
    }
};

