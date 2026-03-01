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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('description');
            $table->string('thumbnail')->nullable();
            $table->string('role')->nullable(); // e.g., Full Stack Developer
            $table->string('demo_url')->nullable();
            $table->string('repo_url')->nullable();
            $table->string('client')->nullable();
            $table->date('completed_at')->nullable();
            $table->enum('status', ['draft', 'published', 'featured'])->default('draft');
            $table->unsignedBigInteger('views')->default(0);
            $table->integer('sort_order')->default(0);
            $table->json('meta')->nullable(); // For SEO meta
            $table->timestamps();
        });

        Schema::create('project_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('project_id')->constrained()->cascadeOnDelete();
            $table->string('path');
            $table->string('alt')->nullable();
            $table->string('caption')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('project_technology', function (Blueprint $table) {
            $table->foreignUuid('project_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('technology_id')->constrained()->cascadeOnDelete();
            $table->primary(['project_id', 'technology_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
        Schema::dropIfExists('project_images');
        Schema::dropIfExists('projects');
    }
};
