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
                'remember_token' => 'oVxMnp3tCopJdH4kiFq26zHyW8Y3zC7SldpBNGlBh3y0E1e10dAjIhiD8bSY',
                'created_at' => '2019-05-04 04:12:02',
                'updated_at' => '2019-05-04 04:12:09',
                'verified' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'IT Support',
                'email' => 'itsupport@mail.com',
                'password' => '$2y$10$Sv2/9jEKa6dRWgocWIHkaO3OgxNFoIj2ADBBlWHuCu72hgHmgqRSW',
                'remember_token' => 'NaBUuJJpF2WtcL6tJy1PC07Tuac0BgEUhvmENTYdEVtvgfRiTIy3jLd968tr',
                'created_at' => '2019-05-19 07:06:37',
                'updated_at' => '2019-05-19 07:38:01',
                'verified' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'IT OPS',
                'email' => 'itops@mail.com',
                'password' => '$2y$10$uMNRwZHoMzeLrnKekULWVu3JteSFCD8pHdyO/gahMdYqlKGcwtN7S',
                'remember_token' => NULL,
                'created_at' => '2019-05-19 15:01:01',
                'updated_at' => '2019-05-19 15:01:01',
                'verified' => 0,
            ),
        ));
        
        
    }
}