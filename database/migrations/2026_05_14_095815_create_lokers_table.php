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
        Schema::create('lokers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('perusahaans')->onDelete('cascade');
            $table->string('judul_loker');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('tipe_pekerjaan');
            $table->string('gaji')->nullable();
            $table->date('batas_lamaran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lokers');
    }
};
