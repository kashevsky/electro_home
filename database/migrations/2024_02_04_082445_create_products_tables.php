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
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->integer('parent_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropColumn('parent_id');
            $table->dropColumn('published');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
}
