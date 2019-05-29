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
                'reason_desc' => '<p>ga bisa</p><p>&nbsp;</p>',
                'solution_desc' => '<p>dtutup yaa</p>',
                'complete_by' => NULL,
                'issue_date' => '2019-05-04 06:48:09',
                'complete_date' => NULL,
                'is_archive' => NULL,
                'status' => 'ITOPS',
                'created_at' => '2019-05-04 06:48:09',
                'updated_at' => '2019-05-19 09:22:19',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'issue_id' => '22190520011910',
                'cat_id' => 2,
                'prio_id' => 5,
                'request_id' => 2,
                'location' => 'pp8',
                'prob_desc' => '<p>123456</p>',
                'reason_desc' => NULL,
                'solution_desc' => NULL,
                'complete_by' => NULL,
                'issue_date' => '2019-05-20 01:19:10',
                'complete_date' => NULL,
                'is_archive' => NULL,
                'status' => 'ITSP',
                'created_at' => '2019-05-20 01:19:10',
                'updated_at' => '2019-05-20 01:19:21',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'issue_id' => '32190520060912',
                'cat_id' => 4,
                'prio_id' => 2,
                'request_id' => 2,
                'location' => 'Terminal 3, Unit 1, Meja ABC',
                'prob_desc' => '<p>Komputer windows 10, ngehang ketika masuk sesuatu program</p>',
                'reason_desc' => NULL,
                'solution_desc' => NULL,
                'complete_by' => NULL,
                'issue_date' => '2019-05-20 06:09:12',
                'complete_date' => NULL,
                'is_archive' => NULL,
                'status' => NULL,
                'created_at' => '2019-05-20 06:09:12',
                'updated_at' => '2019-05-20 06:09:12',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'issue_id' => '41190520063739',
                'cat_id' => 6,
                'prio_id' => 1,
                'request_id' => 1,
                'location' => 'Terminal 3, Unit 1, Meja ABCD',
                'prob_desc' => '<p>acme test</p>',
                'reason_desc' => NULL,
                'solution_desc' => NULL,
                'complete_by' => NULL,
                'issue_date' => '2019-05-20 06:37:39',
                'complete_date' => NULL,
                'is_archive' => NULL,
                'status' => 'ITSP',
                'created_at' => '2019-05-20 06:37:39',
                'updated_at' => '2019-05-25 08:46:32',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'issue_id' => '52190525093603',
                'cat_id' => 3,
                'prio_id' => 1,
                'request_id' => 2,
                'location' => 'Karel house',
                'prob_desc' => NULL,
                'reason_desc' => '<p>Keluhan aja</p>',
                'solution_desc' => NULL,
                'complete_by' => NULL,
                'issue_date' => '2019-05-25 09:36:03',
                'complete_date' => NULL,
                'is_archive' => NULL,
                'status' => 'ITSP',
                'created_at' => '2019-05-25 09:36:03',
                'updated_at' => '2019-05-25 09:36:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}