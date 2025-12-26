<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->string('title', 200);
            $table->string('slug', 220)->unique();
            $table->string('excerpt', 300)->nullable();
            $table->longText('content');

            $table->string('cover_image')->nullable(); 

            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();

            $table->enum('status', ['draft','published','archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_pinned')->default(false);
            $table->unsignedBigInteger('view_count')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status','published_at']);
            $table->index('is_pinned');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
