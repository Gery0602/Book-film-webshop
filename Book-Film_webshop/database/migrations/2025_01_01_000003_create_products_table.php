<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['book', 'film', 'music', 'game']);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('creator'); 
            $table->year('release_year')->nullable();
            $table->string('isbn')->nullable(); 
            $table->integer('duration')->nullable(); 
            $table->string('format')->nullable(); 
            $table->string('language')->default('Hungarian');
            $table->string('cover_image')->nullable();
            $table->json('screenshots')->nullable();
            $table->string('file_path')->nullable(); 
            $table->bigInteger('file_size')->nullable(); 
            $table->boolean('is_active')->default(true);
            $table->integer('download_limit')->default(5);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};