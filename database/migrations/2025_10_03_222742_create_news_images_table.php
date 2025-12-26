<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('news_id')
                  ->constrained('news')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete(); 

            $table->string('path');                
            $table->string('alt')->nullable();     
            $table->string('caption')->nullable(); 
            $table->string('credit')->nullable();  
            $table->unsignedInteger('position')->default(0); 

            $table->timestamps();

            $table->index(['news_id','position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_images');
    }
};

