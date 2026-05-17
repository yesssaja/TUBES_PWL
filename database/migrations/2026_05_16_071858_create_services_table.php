<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('services', function (Blueprint $table) {
        $table->id();
    
        // INFORMASI JASA
        $table->string('freelancer_name');
        $table->string('service_name');
        $table->string('category');
        $table->integer('price');
        $table->string('location');
        $table->longText('description');

        // INFORMASI TAMBAHAN
        $table->string('work_experience');
        $table->json('languages')->nullable();
        $table->string('skills');

        // KONTAK
        $table->string('whatsapp');
        $table->string('email');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
