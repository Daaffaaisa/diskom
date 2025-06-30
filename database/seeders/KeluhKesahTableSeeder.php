<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KeluhKesahTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('keluh_kesah')->delete();
        
        \DB::table('keluh_kesah')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'name' => 'abv',
                'email' => 'admin@smpn44.sch.id',
                'message' => 'awdawd',
                'created_at' => '2025-06-26 12:43:52',
                'updated_at' => '2025-06-26 12:43:52',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'name' => 'JURNAL',
                'email' => 'admin@smpn44.sch.id',
                'message' => 'adawdawfef',
                'created_at' => '2025-06-26 12:47:11',
                'updated_at' => '2025-06-26 12:47:11',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'name' => 'abv',
                'email' => 'admin@smpn44.sch.id',
                'message' => 'awdawdascvxcv',
                'created_at' => '2025-06-26 12:51:42',
                'updated_at' => '2025-06-26 12:51:42',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'name' => 'Daffa Kumara Khiar Faisa',
                'email' => 'budi@siswa.sch.id',
                'message' => 'btzrzrfzf',
                'created_at' => '2025-06-26 12:54:10',
                'updated_at' => '2025-06-26 12:54:10',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'name' => 'test',
                'email' => 'test@gmail.com',
                'message' => 'test',
                'created_at' => '2025-06-26 15:18:59',
                'updated_at' => '2025-06-26 15:18:59',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 2,
                'name' => 'asal',
                'email' => '111202214767@mhs.dinus.ac.id',
                'message' => 'asal coba',
                'created_at' => '2025-06-29 05:59:54',
                'updated_at' => '2025-06-29 05:59:54',
            ),
        ));
        
        
    }
}