<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('brand')->nullable();
            $table->string('code')->nullable();
            $table->string('article')->nullable();
            $table->string('garanty')->nullable();
            $table->boolean('is_exists')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('brand');
            $table->dropColumn('code');
            $table->dropColumn('article');
            $table->dropColumn('garanty');
            $table->dropColumn('is_exists');
        });
    }
};
