<?php

use Illuminate\Database\Seeder;

class FishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Fish::create(array('name' => 'Карась', 'fishtype_id'=>1));
        \App\Models\Fish::create(array('name' => 'Окунь', 'fishtype_id'=>2));
        \App\Models\Fish::create(array('name' => 'Плотва', 'fishtype_id'=>1));
    }

}
