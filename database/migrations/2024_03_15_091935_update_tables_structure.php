<?php

use App\Models\Category;
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
        //
        Schema::dropIfExists('sub_categories');

        Schema::table('categories', function (Blueprint $table) {
            $table->bigInteger('parent_id')->nullable();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sub_category_id');
            $table->foreignIdFor(Category::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('position')->unsigned()->nullable();
            $table->text('cmsSaveType')->nullable();
            $table->integer('public')->nullable();
            $table->date('publish_start_date')->nullable();
            $table->date('publish_end_date')->nullable();
            $table->text('languages')->nullable();
            $table->timestamps();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('sub_category_id');
            $table->dropColumn('category_id');
        });
    }
};
