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
    Schema::table('komentars_232187', function (Blueprint $table) {
        $table->foreignId('user_232187')->constrained('users')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('komentars_232187', function (Blueprint $table) {
        $table->dropForeign(['user_232187']);
        $table->dropColumn('user_232187');
    });
}
};
