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
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->string('komen');
            $table->unsignedBigInteger('idpost');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('comment_id');
            $table->foreign('idpost')->references('id')->on('posts');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('comment_id')->references('id')->on('komens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
