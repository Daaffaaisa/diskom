<?php

namespace Database\Seeders;

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
                'name' => 'Admin SMP',
                'email' => 'admin@smpn44.sch.id',
                'email_verified_at' => NULL,
                'password' => '$2y$12$EJrXnh7ObxI2dyASFXNJ6eRPaPuYnbqk7/2Pgpny86fhWv4Te9.w2',
                'remember_token' => NULL,
                'created_at' => '2025-06-26 04:28:28',
                'updated_at' => '2025-06-26 04:29:53',
                'role' => 'admin',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Budi',
                'email' => 'budi@siswa.sch.id',
                'email_verified_at' => NULL,
                'password' => '$2y$12$kOsvvwAliFUEGpog4nb6q.NqpnEHP9i32OfJ7zGBYhposg2EuR9mS',
                'remember_token' => NULL,
                'created_at' => '2025-06-26 04:28:29',
                'updated_at' => '2025-06-26 04:28:29',
                'role' => 'user',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Cihuy',
                'email' => 'cihuy@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$eGb3yjirIIiQk2hY8mzGZuJGQtpaaivL.FHyQF4GRUG3q2Y5W5l.a',
                'remember_token' => NULL,
                'created_at' => '2025-06-28 13:31:13',
                'updated_at' => '2025-06-28 13:31:13',
                'role' => 'user',
            ),
        ));
        
        
    }
}