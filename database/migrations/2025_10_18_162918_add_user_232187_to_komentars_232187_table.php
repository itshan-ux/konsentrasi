<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi
     */
    public function up(): void
    {
      Schema::table('komentars_232187', function (Blueprint $table) {
        // Hanya tambahkan foreign key-nya, bukan kolom baru
        $table->foreign('user_232187')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Rollback migrasi
     */
    public function down(): void
    {
        Schema::table('komentars_232187', function (Blueprint $table) {
            $table->dropForeign(['user_232187']);
            $table->dropColumn('user_232187');
        });
    }
};
