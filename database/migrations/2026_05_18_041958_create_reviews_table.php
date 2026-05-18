<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('perusahaan_id')
                ->nullable()
                ->constrained('perusahaans')
                ->nullOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('nama');
            $table->string('posisi')->nullable();

            $table->decimal('rating', 2, 1)->default(5.0);
            $table->decimal('rating_gaji', 2, 1)->nullable();
            $table->decimal('rating_kultur', 2, 1)->nullable();
            $table->decimal('rating_fasilitas', 2, 1)->nullable();

            $table->text('ulasan');
            $table->text('balasan_perusahaan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};