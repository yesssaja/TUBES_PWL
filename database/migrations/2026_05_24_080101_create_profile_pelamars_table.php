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
        Schema::create('profile_pelamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('foto_diri')->nullable();
            $table->string('nik',16);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('gender',['Laki-laki','Perempuan']);
            $table->string('no_hp',15);
            $table->string('foto_ktp');
            $table->string('foto_ijazah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_pelamars');
    }
};
