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
                'password' => '$2y$10$p82C6qPFZQhAfzWYD0uyVuQAZxkk5nIsGbdvEUJb313J.RLARNBKO',
                'remember_token' => '0V7vfIctot9QIbAmP91FKcIkhC5pMc0B5B2pefF75P7joXMZIiUrIsXVEpif',
                'created_at' => '2019-05-04 04:12:02',
                'updated_at' => '2019-05-27 03:34:43',
                'verified' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'IT Support',
                'email' => 'itsupport@mail.com',
                'password' => '$2y$10$Sv2/9jEKa6dRWgocWIHkaO3OgxNFoIj2ADBBlWHuCu72hgHmgqRSW',
                'remember_token' => 'uYS36Pc9jqapw6KGrQE6EQ8rDFYVFQ0E7bpCqcOzmkGOJevNo5h1Ze0ZKHAq',
                'created_at' => '2019-05-19 07:06:37',
                'updated_at' => '2019-05-27 03:39:40',
                'verified' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'IT OPS',
                'email' => 'itops@mail.com',
                'password' => '$2y$10$uMNRwZHoMzeLrnKekULWVu3JteSFCD8pHdyO/gahMdYqlKGcwtN7S',
                'remember_token' => 'EnMa24ZY1WojAxh93oAP1fTEYTKeOKYdiiKGNSEHevvfm2puLz66PWM7j7Aa',
                'created_at' => '2019-05-19 15:01:01',
                'updated_at' => '2019-05-27 03:46:50',
                'verified' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'IT ADMIN',
                'email' => 'itadmin@mail.com',
                'password' => '$2y$10$TYDuCXX7rOiufo5IDqz4V.8oZV4IdBax7Wk3WDQzyDHUQjthDBN56',
                'remember_token' => 'bWdWJdZLV33eiCTDJt5VhEiHJnm7ysJC0oWIZKj69WN9RV11KH6dJmiyRLWb',
                'created_at' => '2019-05-27 03:45:17',
                'updated_at' => '2019-05-27 03:45:31',
                'verified' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => '$2y$10$miQRtC92g2WZgz0D1kbcA.9ly90OL.CasDITo4eT8mGaMjaSvNrXu',
                'remember_token' => 'RwJQ2ArFEQN46TFEgcKCPRqQCbV2E78Z8Dmei6ivJRKRNYS9RE6BdQSINEQO',
                'created_at' => '2019-05-27 08:31:47',
                'updated_at' => '2019-05-27 08:32:43',
                'verified' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'IT Non Public',
                'email' => 'itnonpublic@mail.com',
                'password' => '$2y$10$jVN/5FMfNOQ/UvyeC1plTOKmlwb6i1wy3hUeG0YrH5bB0VbTspPPS',
                'remember_token' => NULL,
                'created_at' => '2019-06-24 04:48:09',
                'updated_at' => '2019-06-24 04:48:09',
                'verified' => 1,
            ),
        ));
        
        
    }
}