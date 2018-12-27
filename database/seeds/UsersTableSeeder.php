<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    $_faker = Faker::create();
    
    for($i=0;$i<20;$i++) {
        DB::table('users')->insert([
            'name' => $_faker->name,
            'email' => $_faker->email,
            'password' => bcrypt('password'),
            'active' => rand(0, 1)
        ]);
    }
        DB::table('users')->insert([
            'name' => 'sys administrator',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('123qwe'),
            'isAdmin' => '1'
        ]);
    }

}
