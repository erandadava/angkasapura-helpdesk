<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category')->delete();
        
        \DB::table('category')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cat_name' => 'Application',
                'is_active' => 1,
                'created_at' => '2019-05-04 04:52:25',
                'updated_at' => '2019-05-04 04:52:25',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
            'cat_name' => 'CPU (PC)',
                'is_active' => 1,
                'created_at' => '2019-05-04 04:52:37',
                'updated_at' => '2019-05-04 04:52:51',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'cat_name' => 'Network & Server',
                'is_active' => 1,
                'created_at' => '2019-05-19 16:00:20',
                'updated_at' => '2019-05-19 16:00:20',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'cat_name' => 'OS & Office',
                'is_active' => 1,
                'created_at' => '2019-05-19 16:00:32',
                'updated_at' => '2019-05-19 16:00:32',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'cat_name' => 'Printer',
                'is_active' => 1,
                'created_at' => '2019-05-19 16:00:40',
                'updated_at' => '2019-05-19 16:00:40',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
            'cat_name' => 'System & Security (Login, Password, Antivirus, etc)',
                'is_active' => 1,
                'created_at' => '2019-05-19 16:00:47',
                'updated_at' => '2019-05-19 16:00:47',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'cat_name' => 'Lainnya',
                'is_active' => 1,
                'created_at' => '2019-08-27 08:25:26',
                'updated_at' => '2019-08-27 08:25:26',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}