<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);
            $this->call(RegionsTableSeeder::class);
            $this->call(FishTableSeeder::class);
            $this->call(FishTypesTableSeeder::class);
            $this->call(WaterTypesTableSeeder::class);

    }
}
