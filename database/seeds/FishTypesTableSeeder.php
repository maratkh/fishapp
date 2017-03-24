<?php

use Illuminate\Database\Seeder;

class FishTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FishType::create(array('name' => 'Хищник'));
        \App\Models\FishType::create(array('name' => 'Трафоядный'));

    }

}
