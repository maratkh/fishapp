<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAditionalFiledToWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('waters', function(Blueprint $table){
            $table->integer('watertype_id');
            $table->text('description');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('waters', function(Blueprint $table){
            $table->dropColumn('watertype_id');
            $table->dropColumn('description');
        });

    }
}
