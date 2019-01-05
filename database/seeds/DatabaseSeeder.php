<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'family' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'phone_number' => rand(5958787,7958787),
            'finance' => 0,
            'is_admin' => true,
            'password' => bcrypt('secret'),
        ]);
    }
}
