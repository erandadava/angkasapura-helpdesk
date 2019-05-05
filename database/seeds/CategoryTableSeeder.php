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
        ));
        
        
    }
}