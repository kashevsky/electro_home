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
        Schema::table('sub_category_filters', function (Blueprint $table) {
            //
            $table->string('name')->after('id')->nullable();
            $table->boolean('is_ranged')->after('type')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_category_filters', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('is_ranged');
        });
    }
};
