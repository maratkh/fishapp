<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('regions')){
            Schema::create('regions', function(Blueprint $blueprint){
                $blueprint->increments('id');
                $blueprint->string('name');
                $blueprint->string('code');
                $blueprint->string('fias');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('regions');
    }
}
