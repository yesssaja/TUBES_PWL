<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profile_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan', 255);
            $table->string('logo', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('no_hp', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->unique();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_perusahaan');
    }
};
