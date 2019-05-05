<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => '$2y$10$v5Z13MsHVMyMerXklufcn.bBuaIomKtt7HTS0DnKbJMlz9We.nZXm',
                'remember_token' => NULL,
                'created_at' => '2019-05-04 04:12:02',
                'updated_at' => '2019-05-04 04:12:09',
                'verified' => 1,
            ),
        ));
        
        
    }
}