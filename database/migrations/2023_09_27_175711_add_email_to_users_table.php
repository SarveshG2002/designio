<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add 'email' column after 'name'
            $table->string('email')->after('id')->unique();

            // Add 'name' column after 'email'
            $table->string('name')->after('email');

            // Add 'password' column after 'name'
            $table->string('password')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop 'email', 'name', and 'password' columns
            $table->dropColumn(['email', 'name', 'password']);
        });
    }
};

