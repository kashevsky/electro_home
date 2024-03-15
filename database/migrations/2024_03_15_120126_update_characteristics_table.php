<?php

use App\Models\CharacteristicGroup;
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
        Schema::rename('haracteristics', 'characteristics');

        Schema::table('characteristics', function (Blueprint $table) {
            $table->foreignIdFor(CharacteristicGroup::class, 'group_id');
            $table->dropColumn('parametr');
            $table->dropColumn('value');
            $table->dropColumn('product_id');
            $table->boolean('is_active')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->boolean('in_filter')->nullable();
            $table->boolean('is_expanded')->nullable();
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
        Schema::rename('characteristics', 'haracteristics');

        Schema::table('haracteristics', function (Blueprint $table) {
            $table->dropColumn('group_id');
            $table->string('parametr')->nullable();
            $table->string('value')->nullable();
            $table->integer('product_id')->nullable();
            $table->dropColumn('is_active');
            $table->dropColumn('title');
            $table->dropColumn('type');
            $table->dropColumn('name');
            $table->dropColumn('in_filter');
            $table->dropColumn('is_expanded');
        });
    }
};
