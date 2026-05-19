<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'price')) {
                $table->decimal('price', 12, 2)->default(0)->after('benefit');
            }

            if (!Schema::hasColumn('courses', 'payment_required')) {
                $table->boolean('payment_required')->default(false)->after('price');
            }

            if (!Schema::hasColumn('courses', 'payment_note')) {
                $table->text('payment_note')->nullable()->after('payment_required');
            }
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'payment_note')) {
                $table->dropColumn('payment_note');
            }

            if (Schema::hasColumn('courses', 'payment_required')) {
                $table->dropColumn('payment_required');
            }

            if (Schema::hasColumn('courses', 'price')) {
                $table->dropColumn('price');
            }
        });
    }
};