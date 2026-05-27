<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus tabel perusahaans jika ada
        Schema::dropIfExists('perusahaans');
    }

    public function down(): void
    {
        // Buat ulang tabel perusahaans jika rollback
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('nama_perusahaan');
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};