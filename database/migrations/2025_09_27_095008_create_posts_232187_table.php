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
        Schema::create('posts_232187', function (Blueprint $table) {
            $table->id('id_232187');
            $table->unsignedBigInteger('platform_id_232187');
            $table->string('user_name_232187');
            $table->text('content_232187');
            $table->timestamp('created_at_232187')->nullable();
            $table->timestamp('captured_at_232187')->nullable();
            // $table->timestamps();

            $table->foreign('platform_id_232187')
                ->references('id_232187')
                ->on('platforms_232187')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_232187');
    }
};
