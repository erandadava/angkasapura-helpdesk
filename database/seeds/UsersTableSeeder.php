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
                'remember_token' => 'oVxMnp3tCopJdH4kiFq26zHyW8Y3zC7SldpBNGlBh3y0E1e10dAjIhiD8bSY',
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
                'remember_token' => 'F4h2QynmR3LZqdsFpAYSpEYTcO3x523jjy0NWOj4WpgkOYI3r5r4a1AakxrN',
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
                'remember_token' => NULL,
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
                'remember_token' => 'GWhAtPFtmifrOdAs0D9hjuecyiic5Yo1jWtm1D6LeSOqz7YLYDIPrF4KeKt6',
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
                'remember_token' => 'HBOWgv20QlCawa8Yg8DfUKSs4gZeDvJFtIXlnmYU43p4RwYWZGFu7OjwNi84',
                'created_at' => '2019-05-27 08:31:47',
                'updated_at' => '2019-05-27 08:32:43',
                'verified' => 1,
            ),
        ));
        
        
    }
}