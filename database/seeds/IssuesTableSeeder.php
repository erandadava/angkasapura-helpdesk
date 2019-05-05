<?php

use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('issues')->delete();
        
        \DB::table('issues')->insert(array (
            0 => 
            array (
                'id' => 1,
                'issue_id' => '11190504064809',
                'cat_id' => 1,
                'prio_id' => 2,
                'request_id' => 1,
                'location' => 'A',
                'prob_desc' => '<p>Aplikasi error login</p>',
                'reason_desc' => NULL,
                'complete_by' => NULL,
                'issue_date' => '2019-05-04 06:48:09',
                'complete_date' => NULL,
                'is_archive' => NULL,
                'created_at' => '2019-05-04 06:48:09',
                'updated_at' => '2019-05-04 06:48:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}