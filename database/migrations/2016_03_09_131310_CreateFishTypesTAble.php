<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishTypesTAble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('fish_types')){
            Schema::create('fish_types', function(Blueprint $table){
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
        if(Schema::hasTable('fish_types')){
            Schema::drop('fish_types');
        }
    }
}
