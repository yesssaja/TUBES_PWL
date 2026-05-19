<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus link duplikat, sisakan link paling awal per course
        $duplicates = DB::table('course_links')
            ->select('course_id')
            ->groupBy('course_id')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('course_id');

        foreach ($duplicates as $courseId) {
            $firstId = DB::table('course_links')
                ->where('course_id', $courseId)
                ->orderBy('id')
                ->value('id');

            DB::table('course_links')
                ->where('course_id', $courseId)
                ->where('id', '!=', $firstId)
                ->delete();
        }

        Schema::table('course_links', function (Blueprint $table) {
            $table->unique('course_id');
        });
    }

    public function down(): void
    {
        Schema::table('course_links', function (Blueprint $table) {
            $table->dropUnique(['course_id']);
        });
    }
};