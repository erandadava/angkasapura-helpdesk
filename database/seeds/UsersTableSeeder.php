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
                'remember_token' => 'uuC2nrnUfsKW51bJc5hSHbT9mqshSDdBPuG54Ai53Pg4uvYuoRWIcOuQUjFN',
                'created_at' => '2019-05-04 04:12:02',
                'updated_at' => '2019-05-04 04:12:09',
                'verified' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'IT Support',
                'email' => 'itsupport@mail.com',
                'password' => '$2y$10$lcgQ/Em/G9i7GBAZUdliW.F0iLfVkxn.WFhlBuPUrVDfyqUcqj4qe',
                'remember_token' => NULL,
                'created_at' => '2019-05-19 07:06:37',
                'updated_at' => '2019-05-19 07:06:37',
                'verified' => 0,
            ),
        ));
        
        
    }
}