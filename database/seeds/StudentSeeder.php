<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Student');

        DB::table('students')->insert([
            'stu_id' => 1162816,
            'bus_id' => 1,
            'fname' => 'Archael',
            'lname' => 'Ardines',
            'email' => 'archael@gmail.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
