<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('inboxes', function (Blueprint $table) {
        $table->unsignedBigInteger('perusahaan_id')->nullable()->after('pelamar_id');
    });
}

public function down(): void
{
    Schema::table('inboxes', function (Blueprint $table) {
        $table->dropColumn('perusahaan_id');
    });
}
};
