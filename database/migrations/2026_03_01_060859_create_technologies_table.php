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
        Schema::create('technologies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->nullable(); // SVG icon or image path
            $table->string('icon_type')->default('image'); // image, svg, devicon
            $table->string('color', 7)->nullable(); // Hex color
            $table->enum('category', [
                'language',
                'framework',
                'database',
                'devops',
                'tool',
                'other'
            ])->default('other');
            $table->integer('proficiency')->default(80); // 0-100 percent
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
