<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Bus');

        DB::table('buses')->insert([
            'plate_num' => str_random(10),
            'reg_num' => str_random(10),
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
