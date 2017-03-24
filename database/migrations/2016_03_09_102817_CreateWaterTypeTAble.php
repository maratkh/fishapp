<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterTypeTAble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('water_types')){
            Schema::create('water_types', function(Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->text('description');
                $table->timestamps();

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
        if(Schema::hasTable('water_types')){
            Schema::drop('water_types');
        }
    }
}
