<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi (menambah kolom user_id ke tabel komentars)
     */
    public function up(): void
    {
        Schema::table('komentars', function (Blueprint $table) {
            // Tambahkan foreign key user_id di sini 👇
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Rollback migrasi (hapus kolom user_id jika dibatalkan)
     */
    public function down(): void
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
