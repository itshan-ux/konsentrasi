<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komentars_232187', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('komentar');
            $table->string('status_sentimen')->nullable(); // Positif / Negatif / Netral
            $table->timestamps();

            // Foreign key mengacu ke tabel users_232187 dan kolom id_232187
            $table->foreign('user_id')
                ->references('id_232187')
                ->on('users_232187')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentars_232187');
    }
};
