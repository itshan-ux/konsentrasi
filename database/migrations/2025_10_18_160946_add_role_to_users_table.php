<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk menambah kolom role pada tabel users.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom role dengan nilai default 'user'
            $table->string('role')->default('user')->after('email');
        });
    }

    /**
     * Batalkan perubahan migrasi (rollback).
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom role jika rollback
            $table->dropColumn('role');
        });
    }
};
