<?php

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_roles')->delete();
        
        \DB::table('model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 2,
            ),
            1 => 
            array (
                'role_id' => 4,
                'model_type' => 'App\\User',
                'model_id' => 3,
            ),
        ));
        
        
    }
}