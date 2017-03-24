<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterFishRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_fish', function(Blueprint $blueprint){
            $blueprint->integer('water_id')->unsigned();
            $blueprint->integer('fish_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('water_fish')){
            Schema::dropIfExists('water_fish');
        }

    }

}
