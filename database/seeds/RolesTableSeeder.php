<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'IT Administrator',
                'guard_name' => 'web',
                'created_at' => '2019-05-05 06:07:48',
                'updated_at' => '2019-05-05 06:07:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User',
                'guard_name' => 'web',
                'created_at' => '2019-05-05 06:17:22',
                'updated_at' => '2019-05-05 06:17:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'IT Support',
                'guard_name' => 'web',
                'created_at' => '2019-05-05 06:17:30',
                'updated_at' => '2019-05-05 06:17:30',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'IT Operasional',
                'guard_name' => 'web',
                'created_at' => '2019-05-05 06:17:42',
                'updated_at' => '2019-05-05 06:17:42',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'IT Non Public',
                'guard_name' => 'web',
                'created_at' => '2019-05-05 06:17:51',
                'updated_at' => '2019-05-05 06:17:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2019-05-27 08:31:14',
                'updated_at' => '2019-05-27 08:31:14',
            ),
        ));
        
        
    }
}