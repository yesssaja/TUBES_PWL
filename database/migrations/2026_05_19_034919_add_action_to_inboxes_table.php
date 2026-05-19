<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inboxes', function (Blueprint $table) {
            if (!Schema::hasColumn('inboxes', 'action_text')) {
                $table->string('action_text')->nullable()->after('message');
            }

            if (!Schema::hasColumn('inboxes', 'action_url')) {
                $table->text('action_url')->nullable()->after('action_text');
            }
        });
    }

    public function down(): void
    {
        Schema::table('inboxes', function (Blueprint $table) {
            if (Schema::hasColumn('inboxes', 'action_text')) {
                $table->dropColumn('action_text');
            }

            if (Schema::hasColumn('inboxes', 'action_url')) {
                $table->dropColumn('action_url');
            }
        });
    }
};