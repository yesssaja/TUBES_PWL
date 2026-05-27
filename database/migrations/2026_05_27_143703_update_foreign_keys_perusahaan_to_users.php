<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Events
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id'] ?? null); // hapus FK lama kalau ada
            $table->foreign('perusahaan_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Loker
        Schema::table('lokers', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id'] ?? null);
            $table->foreign('perusahaan_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Review
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id'] ?? null);
            $table->foreign('perusahaan_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id']);
        });

        Schema::table('lokers', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id']);
        });
    }
};