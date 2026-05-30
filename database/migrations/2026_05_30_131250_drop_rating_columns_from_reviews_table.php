<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn([
                'rating_gaji',
                'rating_kultur',
                'rating_fasilitas'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->decimal('rating_gaji', 2, 1)->nullable();
            $table->decimal('rating_kultur', 2, 1)->nullable();
            $table->decimal('rating_fasilitas', 2, 1)->nullable();
        });
    }
};