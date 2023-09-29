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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->text('bio')->nullable();
            $table->string('profession')->nullable();
            $table->text('experience')->nullable();
            $table->string('skills')->nullable();
            $table->string('location')->nullable();
            $table->string('presence')->nullable();
            $table->string('profile')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
// Add more columns as needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
