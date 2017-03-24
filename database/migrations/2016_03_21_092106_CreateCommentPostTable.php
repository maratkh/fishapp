<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_post', function(Blueprint $blueprint){
            $blueprint->increments('id');
            $blueprint->integer('user_id')->unsigned();
            $blueprint->integer('post_id')->unsigned();
            $blueprint->text('comment');
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
        if(Schema::hasTable('comment_post')){
            Schema::dropIfExists('comment_post');
        }

    }
}
