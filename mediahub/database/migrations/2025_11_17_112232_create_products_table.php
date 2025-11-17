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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->enum('type', ['book', 'movie', 'music']); // vagy amiket használsz

            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);

            $table->string('creator')->nullable();
            $table->year('release_year')->nullable();

            // Movie/music fields
            $table->integer('duration')->nullable(); // percben

            $table->string('format')->nullable(); // HD, 4K, stb.

            $table->string('cover_image')->nullable();

            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('file_size')->nullable(); // byte-ban

            $table->integer('download_limit')->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
