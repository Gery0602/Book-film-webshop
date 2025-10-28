<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Support;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('description');
            $table->string('cover_image')->nullable();
            $table->integer('publication_year');
            $table->integer('pages');
            $table->string('isbn')->unique();
            $table->decimal('price', 8, 2);
            $table->decimal('rating', 3, 1)->default(0);
            $table->string('language')->default('magyar');
            $table->string('publisher');
            $table->boolean('is_featured')->default(false);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};