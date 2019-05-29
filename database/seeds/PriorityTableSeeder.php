<?php

use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('priority')->delete();
        
        \DB::table('priority')->insert(array (
            0 => 
            array (
                'id' => 1,
                'prio_name' => 'Kritis',
                'is_active' => 1,
                'created_at' => '2019-05-04 04:19:47',
                'updated_at' => '2019-05-04 04:19:47',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'prio_name' => 'Tinggi',
                'is_active' => 0,
                'created_at' => '2019-05-04 04:40:08',
                'updated_at' => '2019-05-04 04:42:41',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'prio_name' => 'Sedang',
                'is_active' => 1,
                'created_at' => '2019-05-04 04:40:45',
                'updated_at' => '2019-05-04 04:40:45',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'prio_name' => 'Sedang',
                'is_active' => 1,
                'created_at' => '2019-05-19 16:02:30',
                'updated_at' => '2019-05-19 16:02:38',
                'deleted_at' => '2019-05-19 16:02:38',
            ),
            4 => 
            array (
                'id' => 5,
                'prio_name' => 'Rendah',
                'is_active' => 1,
                'created_at' => '2019-05-19 16:02:46',
                'updated_at' => '2019-05-19 16:02:46',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'prio_name' => 'Pimpinan',
                'is_active' => 1,
                'created_at' => '2019-05-19 16:02:59',
                'updated_at' => '2019-05-19 16:02:59',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}