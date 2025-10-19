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
        Schema::create('topics_232187', function (Blueprint $table) {
            $table->id('id_232187');
            $table->unsignedBigInteger('post_id_232187');
            $table->string('topic_name_232187');
          //d  $table->timestamps();

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
        Schema::dropIfExists('topics_232187');
    }
};
