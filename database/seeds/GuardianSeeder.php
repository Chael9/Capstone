<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Guardian');

        DB::table('guardians')->insert([
            'fname' => 'Karen Mae',
            'lname' => 'Cabahug',
            'student_id' => 1162815,
            'email' => 'karen@gmail.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
