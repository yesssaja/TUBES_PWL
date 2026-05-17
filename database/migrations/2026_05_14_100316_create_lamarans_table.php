// database/migrations/2026_05_14_100316_create_lamarans_table.php

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

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('loker_id')->constrained('lokers')->cascadeOnDelete();

            $table->string('nama');
            $table->string('email');
            $table->string('hp', 20);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);

            $table->string('cv');
            $table->string('foto')->nullable();
            $table->string('portfolio')->nullable();
            $table->text('motivasi')->nullable();

            $table->enum('status_lamaran', ['pending', 'diterima', 'ditolak'])->default('pending');

            $table->timestamps();

            $table->unique(['user_id', 'loker_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};