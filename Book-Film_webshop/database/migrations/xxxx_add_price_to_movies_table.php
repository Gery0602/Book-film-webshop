<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->default(0)->after('genre');
            $table->integer('stock')->default(0)->after('price');
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn(['price', 'stock']);
        });
    }
};