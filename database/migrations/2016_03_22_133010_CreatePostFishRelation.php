<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostFishRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_fish', function(Blueprint $blueprint){
            $blueprint->integer('post_id')->unsigned();
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
        if(Schema::hasTable('post_fish')){
            Schema::dropIfExists('post_fish');
        }

    }

}
