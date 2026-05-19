<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('course_registration_id')
                ->constrained('course_registrations')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            $table->decimal('amount', 12, 2)->default(0);
            $table->string('payment_method')->nullable();
            $table->string('proof_image')->nullable();

            $table->enum('status', ['pending', 'verified', 'rejected'])
                ->default('pending');

            $table->text('note')->nullable();
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();

            $table->unique('course_registration_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_payments');
    }
};