<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GuruTendikTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('guru_tendik')->delete();
        
        \DB::table('guru_tendik')->insert(array (
            0 => 
            array (
                'id' => 2,
                'nama' => 'Y. Hesty Padmaratnawati, S.Pd',
                'jabatan' => 'Kepala Sekolah',
                'foto' => '"assets/guruTendik_images/1751282424_686272f847776.jpg"',
                'created_at' => '2025-06-30 04:06:50',
                'updated_at' => '2025-06-30 11:20:24',
            ),
            1 => 
            array (
                'id' => 3,
                'nama' => 'Dwi Kurniawati, A.Md',
                'jabatan' => 'Koordinator Administrasi',
                'foto' => '"assets/guruTendik_images/1751282459_6862731b39ae3.png"',
                'created_at' => '2025-06-30 04:30:39',
                'updated_at' => '2025-06-30 11:20:59',
            ),
            2 => 
            array (
                'id' => 4,
                'nama' => 'Upik Kumala Dewi N., S.Psi.',
                'jabatan' => 'Guru BK',
                'foto' => '"assets/guruTendik_images/1751282495_6862733fda899.png"',
                'created_at' => '2025-06-30 11:21:35',
                'updated_at' => '2025-06-30 11:21:35',
            ),
            3 => 
            array (
                'id' => 5,
                'nama' => 'RR. Reni Hartati, M.Pd.',
                'jabatan' => 'Guru BK',
                'foto' => '"assets/guruTendik_images/1751282517_6862735525fdd.png"',
                'created_at' => '2025-06-30 11:21:57',
                'updated_at' => '2025-06-30 11:21:57',
            ),
            4 => 
            array (
                'id' => 6,
                'nama' => 'Dwi Indarwanti,S.Pd',
                'jabatan' => 'Guru Matematka',
                'foto' => '"assets/guruTendik_images/1751283080_68627588b01e6.png"',
                'created_at' => '2025-06-30 11:28:00',
                'updated_at' => '2025-06-30 11:31:20',
            ),
            5 => 
            array (
                'id' => 7,
                'nama' => 'Muntiarsih, S.Pd.',
                'jabatan' => 'Guru Matematka',
                'foto' => '"assets/guruTendik_images/1751283130_686275ba176da.png"',
                'created_at' => '2025-06-30 11:32:10',
                'updated_at' => '2025-06-30 11:32:10',
            ),
            6 => 
            array (
                'id' => 8,
                'nama' => 'Tika Herlita Putri, S.Pd',
                'jabatan' => 'Guru Ilmu Pengetahuan Alam',
                'foto' => '"assets/guruTendik_images/1751283154_686275d27fafb.png"',
                'created_at' => '2025-06-30 11:32:34',
                'updated_at' => '2025-06-30 11:32:34',
            ),
            7 => 
            array (
                'id' => 9,
                'nama' => 'Supardjo, S.Pd.',
                'jabatan' => 'Guru Ilmu Pengetahuan Alam',
                'foto' => '"assets/guruTendik_images/1751283173_686275e51a10b.png"',
                'created_at' => '2025-06-30 11:32:53',
                'updated_at' => '2025-06-30 11:32:53',
            ),
            8 => 
            array (
                'id' => 10,
                'nama' => 'Ibnu Budi Santoso,S.Pd',
                'jabatan' => 'Guru Bahasa Indonesia',
                'foto' => '"assets/guruTendik_images/1751283208_686276088f509.png"',
                'created_at' => '2025-06-30 11:33:28',
                'updated_at' => '2025-06-30 11:33:28',
            ),
            9 => 
            array (
                'id' => 11,
                'nama' => 'Arif Aji Mastoto,M.Pd',
                'jabatan' => 'Guru Bahasa Indonesia',
                'foto' => '"assets/guruTendik_images/1751283227_6862761b47557.png"',
                'created_at' => '2025-06-30 11:33:47',
                'updated_at' => '2025-06-30 11:33:47',
            ),
            10 => 
            array (
                'id' => 12,
                'nama' => 'Tri Yulistiyanto,S.Pd',
                'jabatan' => 'Guru Bahasa Inggris',
                'foto' => '"assets/guruTendik_images/1751283241_68627629a293b.png"',
                'created_at' => '2025-06-30 11:34:01',
                'updated_at' => '2025-06-30 11:34:01',
            ),
            11 => 
            array (
                'id' => 13,
                'nama' => 'Lulus Aji Prihanto,S.Pd',
                'jabatan' => 'Guru Bahasa Inggris',
                'foto' => '"assets/guruTendik_images/1751283257_686276396863a.png"',
                'created_at' => '2025-06-30 11:34:17',
                'updated_at' => '2025-06-30 11:34:17',
            ),
            12 => 
            array (
                'id' => 14,
                'nama' => 'Drs.Yusuf Noegroho, S.Pd.',
                'jabatan' => 'Guru Ilmu Pengetahuan Sosial',
                'foto' => '"assets/guruTendik_images/1751283287_68627657ce2cc.png"',
                'created_at' => '2025-06-30 11:34:47',
                'updated_at' => '2025-06-30 11:34:47',
            ),
            13 => 
            array (
                'id' => 15,
                'nama' => 'Retno Sri Haryani, S.Pd.',
                'jabatan' => 'Guru Ilmu Pengetahuan Sosial',
                'foto' => '"assets/guruTendik_images/1751283302_6862766628fc2.png"',
                'created_at' => '2025-06-30 11:35:02',
                'updated_at' => '2025-06-30 11:35:02',
            ),
            14 => 
            array (
                'id' => 16,
                'nama' => 'Pujaningsih,S.Pd',
                'jabatan' => 'Guru Penjasorkes',
                'foto' => '"assets/guruTendik_images/1751283338_6862768a144e5.png"',
                'created_at' => '2025-06-30 11:35:38',
                'updated_at' => '2025-06-30 11:35:38',
            ),
            15 => 
            array (
                'id' => 17,
                'nama' => 'Dra. Ismiyatun',
                'jabatan' => 'Guru Pendidikan Agama Islam',
                'foto' => '"assets/guruTendik_images/1751283366_686276a6021f3.png"',
                'created_at' => '2025-06-30 11:36:06',
                'updated_at' => '2025-06-30 11:36:06',
            ),
            16 => 
            array (
                'id' => 18,
                'nama' => 'Dra. Irstianah',
                'jabatan' => 'Guru Pendidikan Pancasila dan Kewarganegaraan',
                'foto' => '"assets/guruTendik_images/1751283410_686276d22155d.png"',
                'created_at' => '2025-06-30 11:36:50',
                'updated_at' => '2025-06-30 11:36:50',
            ),
            17 => 
            array (
                'id' => 19,
                'nama' => 'Riandi Kusumawardani, S.Kom',
                'jabatan' => 'Guru Prakarya',
                'foto' => '"assets/guruTendik_images/1751283429_686276e58ce36.png"',
                'created_at' => '2025-06-30 11:37:09',
                'updated_at' => '2025-06-30 11:37:09',
            ),
            18 => 
            array (
                'id' => 20,
                'nama' => 'Tiur Wulan Anggraini, S.Pd.',
                'jabatan' => 'Guru Seni Budaya',
                'foto' => '"assets/guruTendik_images/1751283446_686276f6c3c34.png"',
                'created_at' => '2025-06-30 11:37:26',
                'updated_at' => '2025-06-30 11:37:26',
            ),
            19 => 
            array (
                'id' => 21,
                'nama' => 'Syifaun Nurul Umam',
                'jabatan' => 'Staff TU',
                'foto' => '"assets/guruTendik_images/1751283461_68627705bf49a.png"',
                'created_at' => '2025-06-30 11:37:41',
                'updated_at' => '2025-06-30 11:37:41',
            ),
            20 => 
            array (
                'id' => 22,
                'nama' => 'Nur Khasanah, S.Kom.',
                'jabatan' => 'Staff TU',
                'foto' => '"assets/guruTendik_images/1751283473_686277116ecdf.png"',
                'created_at' => '2025-06-30 11:37:53',
                'updated_at' => '2025-06-30 11:37:53',
            ),
            21 => 
            array (
                'id' => 23,
                'nama' => 'Tiara Indah Sitaresmi, S. I. Pust.',
                'jabatan' => 'Staff TU',
                'foto' => '"assets/guruTendik_images/1751283485_6862771ddf3af.png"',
                'created_at' => '2025-06-30 11:38:05',
                'updated_at' => '2025-06-30 11:38:05',
            ),
            22 => 
            array (
                'id' => 24,
                'nama' => 'Siti Anisah, S.Pd.',
                'jabatan' => 'Staff TU',
                'foto' => '"assets/guruTendik_images/1751283494_6862772664db5.png"',
                'created_at' => '2025-06-30 11:38:14',
                'updated_at' => '2025-06-30 11:38:14',
            ),
            23 => 
            array (
                'id' => 25,
                'nama' => 'Agus Supriyanto, S.Pd.',
                'jabatan' => 'Pramu Kebersihan',
                'foto' => '"assets/guruTendik_images/1751283513_686277397fb64.png"',
                'created_at' => '2025-06-30 11:38:33',
                'updated_at' => '2025-06-30 11:38:33',
            ),
            24 => 
            array (
                'id' => 26,
                'nama' => 'Angga Widi Pujianto',
                'jabatan' => 'Pramu Kebersihan',
                'foto' => '"assets/guruTendik_images/1751283526_68627746c8fc8.png"',
                'created_at' => '2025-06-30 11:38:46',
                'updated_at' => '2025-06-30 11:38:46',
            ),
            25 => 
            array (
                'id' => 27,
                'nama' => 'Santoso',
                'jabatan' => 'Pramu Kebersihan',
                'foto' => '"assets/guruTendik_images/1751283540_686277541c844.png"',
                'created_at' => '2025-06-30 11:39:00',
                'updated_at' => '2025-06-30 11:39:00',
            ),
            26 => 
            array (
                'id' => 28,
                'nama' => 'Mintarso',
                'jabatan' => 'Petugas Keamanan',
                'foto' => '"assets/guruTendik_images/1751283560_68627768c84ca.png"',
                'created_at' => '2025-06-30 11:39:20',
                'updated_at' => '2025-06-30 11:39:20',
            ),
            27 => 
            array (
                'id' => 29,
                'nama' => 'Angga Wahyu Nirmala',
                'jabatan' => 'Petugas Keamanan',
                'foto' => '"assets/guruTendik_images/1751283578_6862777a0d4a0.png"',
                'created_at' => '2025-06-30 11:39:38',
                'updated_at' => '2025-06-30 11:39:38',
            ),
            28 => 
            array (
                'id' => 30,
                'nama' => 'Putra Bagas Riantaji',
                'jabatan' => 'Petugas Keamanan',
                'foto' => '"assets/guruTendik_images/1751283594_6862778a7506d.png"',
                'created_at' => '2025-06-30 11:39:54',
                'updated_at' => '2025-06-30 11:39:54',
            ),
        ));
        
        
    }
}