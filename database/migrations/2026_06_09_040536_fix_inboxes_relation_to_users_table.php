<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
{
    Schema::table('inboxes', function (Blueprint $table) {
        $table->foreign('pelamar_id')
            ->references('id')
            ->on('users')
            ->nullOnDelete();

        $table->foreign('perusahaan_id')
            ->references('id')
            ->on('users')
            ->nullOnDelete();
    });
}

    public function down(): void
    {
        Schema::table('inboxes', function (Blueprint $table) {
            $table->dropForeign(['pelamar_id']);
            $table->dropForeign(['perusahaan_id']);
        });
    }
};