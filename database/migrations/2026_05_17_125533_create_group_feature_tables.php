<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | GROUPS
        |--------------------------------------------------------------------------
        */
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('icon_letter', 5)->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('is_public')->default(true);

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | GROUP MEMBERS
        |--------------------------------------------------------------------------
        */
        Schema::create('group_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('group_id')
                ->constrained('groups')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->enum('role', ['member', 'moderator'])->default('member');
            $table->timestamp('joined_at')->nullable();
            $table->timestamps();

            $table->unique(['group_id', 'user_id']);
        });

        /*
        |--------------------------------------------------------------------------
        | GROUP POSTS
        |--------------------------------------------------------------------------
        */
        Schema::create('group_posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('group_id')
                ->constrained('groups')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->text('content');
            $table->boolean('is_reported')->default(false);
            $table->unsignedInteger('report_count')->default(0);
            $table->timestamp('hidden_at')->nullable();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | GROUP POST COMMENTS
        |--------------------------------------------------------------------------
        */
        Schema::create('group_post_comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')
                ->constrained('group_posts')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->text('content');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | GROUP POST LIKES
        |--------------------------------------------------------------------------
        */
        Schema::create('group_post_likes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')
                ->constrained('group_posts')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['post_id', 'user_id']);
        });

        /*
        |--------------------------------------------------------------------------
        | GROUP POST REPORTS
        |--------------------------------------------------------------------------
        */
        Schema::create('group_post_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')
                ->constrained('group_posts')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('reason')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'rejected'])->default('pending');
            $table->timestamps();

            $table->unique(['post_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('group_post_reports');
        Schema::dropIfExists('group_post_likes');
        Schema::dropIfExists('group_post_comments');
        Schema::dropIfExists('group_posts');
        Schema::dropIfExists('group_members');
        Schema::dropIfExists('groups');
    }
};