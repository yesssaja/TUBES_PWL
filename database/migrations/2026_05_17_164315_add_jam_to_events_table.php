<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('events', 'jam')) {
            Schema::table('events', function (Blueprint $table) {
                $table->time('jam')->nullable()->after('tanggal_event');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('events', 'jam')) {
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('jam');
            });
        }
    }
};