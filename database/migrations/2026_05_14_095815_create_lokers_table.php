// database/migrations/2026_05_14_095815_create_lokers_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lokers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('perusahaans')->cascadeOnDelete();
            $table->string('judul_loker');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('tipe_pekerjaan', 100);
            $table->string('gaji', 100)->nullable();
            $table->date('batas_lamaran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lokers');
    }
};