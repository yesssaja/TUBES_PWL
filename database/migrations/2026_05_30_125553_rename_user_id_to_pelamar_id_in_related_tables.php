<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = [
            'reviews',
            'services',
            'rsvps',
            'inboxes',
            'course_registrations',
            'course_payments',
            'lamarans',
        ];

        foreach ($tables as $table) {
            if (Schema::hasColumn($table, 'user_id')) {
                DB::statement("ALTER TABLE `$table` CHANGE `user_id` `pelamar_id` BIGINT UNSIGNED NULL");
            }
        }
    }

    public function down(): void
    {
        $tables = [
            'reviews',
            'services',
            'rsvps',
            'inboxes',
            'course_registrations',
            'course_payments',
            'lamarans',
        ];

        foreach ($tables as $table) {
            if (Schema::hasColumn($table, 'pelamar_id')) {
                DB::statement("ALTER TABLE `$table` CHANGE `pelamar_id` `user_id` BIGINT UNSIGNED NULL");
            }
        }
    }
};