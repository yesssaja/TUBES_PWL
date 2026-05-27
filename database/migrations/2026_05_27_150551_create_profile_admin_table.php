<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile_admin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // 1:1 ke users
            $table->string('foto')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_admin');
    }
};