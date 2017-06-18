<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
    	\App\User::create([
    		"first_name"=>"al",
    		"last_name"=>"hamdani",
    		"email"=>"danidani@gmail.com",
    		"password"=>bcrypt("123456"),
    		"role"=>"pemilik",

		]);

        factory(\App\User::class, 10)->create(['role' => 'member']); 
        factory(\App\User::class, 10)->create(['role' => 'vendor']); 
    }
}
