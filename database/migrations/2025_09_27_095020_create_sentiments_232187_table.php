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
        Schema::create('sentiments_232187', function (Blueprint $table) {
            $table->id('id_232187');
            $table->unsignedBigInteger('post_id_232187');
            $table->string('sentiment_label_232187');
            $table->float('sentiment_score_232187');
            $table->timestamp('analyzed_at_232187')->nullable();
           //  $table->timestamps();

            $table->foreign('post_id_232187')
                ->references('id_232187')
                ->on('posts_232187')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentiments_232187');
    }
};
