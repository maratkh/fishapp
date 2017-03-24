<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_post', function(Blueprint $blueprint){
            $blueprint->increments('id');
            $blueprint->integer('user_id')->unsigned();
            $blueprint->integer('post_id')->unsigned();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('like_post')){
            Schema::dropIfExists('like_post');
        }

    }
}
