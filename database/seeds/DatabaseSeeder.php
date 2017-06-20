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
    	\DB::table('users')->truncate();
        \DB::table('usermetas')->truncate();
        \DB::table('albums')->truncate();
        \DB::table('photos')->truncate();
        \DB::table('members')->truncate();
    	
        $this->call(UsersTableSeeder::class);
        // $this->call(PhotosTableSeeder::class);
    }
}
