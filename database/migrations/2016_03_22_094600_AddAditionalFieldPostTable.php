<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAditionalFieldPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TODO Тут добавляется поле локаль рыбалки
        DB::statement('ALTER TABLE posts  ADD COLUMN location geometry DEFAULT NULL');

        Schema::table('posts', function(Blueprint $table){
            $table->dateTime('fishing_date');
            $table->integer('rate');
            $table->float('deep');
            $table->float('water_temp');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table){
            $table->dropColumn('fishing_date');
            $table->dropColumn('rate');
            $table->dropColumn('deep');
            $table->dropColumn('water_temp');

        });

    }
}
