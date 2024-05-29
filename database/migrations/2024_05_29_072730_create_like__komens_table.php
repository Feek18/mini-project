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
        Schema::create('like__komens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Userid');
            $table->unsignedBigInteger('id_comment');
            $table->foreign('Userid')->references('id')->on('users');
            $table->foreign('id_comment')->references('id')->on('komens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like__komens');
    }
};
