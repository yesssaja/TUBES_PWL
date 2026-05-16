<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();

            // RELASI
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('loker_id')->nullable()->constrained('lokers')->nullOnDelete();

            // DATA DIRI
            $table->string('nama');
            $table->string('email');
            $table->string('hp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('gender');

            // DOKUMEN
            $table->string('cv');
            $table->string('foto')->nullable();

            // TAMBAHAN
            $table->string('portfolio')->nullable();
            $table->text('motivasi')->nullable();

            // STATUS
            $table->enum('status_lamaran', ['pending', 'diterima', 'ditolak'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};