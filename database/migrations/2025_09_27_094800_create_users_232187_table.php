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
        Schema::create('users_232187', function (Blueprint $table) {
            $table->id('id_232187');
            $table->string('name_232187');
            $table->string('email_232187')->unique();
            $table->string('password_232187');
            $table->string('role_232187')->default('user');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_232187');
    }
};
