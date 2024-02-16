<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTables extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
            $table->integer('parent_id')->nullable();
            $table->boolean('published')->nullable();
            $table->integer('is_sale')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
