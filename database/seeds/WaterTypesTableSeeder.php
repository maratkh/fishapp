<?php

use Illuminate\Database\Seeder;

class WaterTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\WaterType::create(array('name' => 'Озеро'));
        \App\Models\WaterType::create(array('name' => 'Водохранилище'));
        \App\Models\WaterType::create(array('name' => 'Болото'));
        \App\Models\WaterType::create(array('name' => 'Пруд'));
        \App\Models\WaterType::create(array('name' => 'Ручей'));
    }

}
