<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrestasisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('prestasis')->delete();
        
        \DB::table('prestasis')->insert(array (
            0 => 
            array (
                'id' => 8,
            'judul' => 'Juara 1 Taekwondo 52-58 Kg (POPDA)',
                'pencapai' => 'Yattaqi Abiyyu',
                'periode' => 'Januari 2017',
                'tahun' => 2017,
                'deskripsi_singkat' => 'Yattaqi Abiyyu meraih juara 1 dalam kejuaraan POPDA cabang Taekwondo kelas 52–56kg tingkat Kota Semarang. Prestasi ini menunjukkan keunggulannya dalam pertandingan tingkat kota.',
                'created_at' => '2025-06-30 12:00:51',
                'updated_at' => '2025-06-30 12:07:53',
            ),
            1 => 
            array (
                'id' => 10,
                'judul' => 'Juara 1 Taekwondo Bupati Kendal Cup',
                'pencapai' => 'Yattaqi Abiyyu',
                'periode' => 'Februari 2017',
                'tahun' => 2017,
                'deskripsi_singkat' => 'Yattaqi Abiyyu kembali membuktikan kemampuannya dengan menyabet juara 1 di ajang Bupati Kendal Cup, kompetisi tingkat kota/kabupaten.',
                'created_at' => '2025-06-30 12:07:40',
                'updated_at' => '2025-06-30 12:07:40',
            ),
            2 => 
            array (
                'id' => 11,
                'judul' => 'Juara 3 Taekwondo Magelang Open Championship Cup V',
                'pencapai' => 'Yattaqi Abiyyu',
                'periode' => 'Maret 2017',
                'tahun' => 2017,
                'deskripsi_singkat' => 'Dalam kejuaraan terbuka di Magelang, Yattaqi Abiyyu meraih juara 3. Ini menunjukkan konsistensinya dalam meraih prestasi di berbagai turnamen luar kota.',
                'created_at' => '2025-06-30 12:17:14',
                'updated_at' => '2025-06-30 12:17:14',
            ),
            3 => 
            array (
                'id' => 12,
                'judul' => 'Juara 1 Taekwondo USM Cup',
                'pencapai' => 'Yattaqi Abiyyu',
                'periode' => 'April 2017',
                'tahun' => 2017,
                'deskripsi_singkat' => 'Yattaqi Abiyyu berhasil mengukir prestasi tingkat provinsi dengan menjadi juara 1 pada ajang USM Cup. Ini menandai pencapaiannya yang lebih tinggi dari tingkat kota/kabupaten.',
                'created_at' => '2025-06-30 12:18:20',
                'updated_at' => '2025-06-30 12:18:20',
            ),
            4 => 
            array (
                'id' => 13,
            'judul' => 'Juara 3 Sepak Bola (POPDA)',
                'pencapai' => 'Tim Sepak Bola SMPN44 Semarang',
                'periode' => 'Maret 2017',
                'tahun' => 2017,
                'deskripsi_singkat' => 'Tim sepak bola yang terdiri dari Adimas Wahyu Sejati dan kawan-kawan meraih juara 3 di ajang POPDA tingkat Kota Semarang. Ini merupakan pencapaian yang membanggakan dalam kompetisi tim.',
                'created_at' => '2025-06-30 12:20:59',
                'updated_at' => '2025-06-30 12:20:59',
            ),
            5 => 
            array (
                'id' => 14,
                'judul' => 'Juara 1 Taekwondo Palagan Open Cup',
                'pencapai' => 'Yattaqi Abiyyu',
                'periode' => 'Januari 2018',
                'tahun' => 2018,
                'deskripsi_singkat' => 'Yattaqi Abiyyu meraih juara 1 dalam ajang Taekwondo Palagan Open Cup tingkat provinsi. Prestasi ini menunjukkan kemampuan bela dirinya yang luar biasa di level regional.',
                'created_at' => '2025-06-30 12:24:33',
                'updated_at' => '2025-06-30 12:24:33',
            ),
            6 => 
            array (
                'id' => 15,
            'judul' => 'Juara 2 Sepak Takraw (POPDA)',
                'pencapai' => 'Bayu Veri Amada, Muhammad Dhani Moreno, Muhammad Tegar Saputra, dan Rahma Erin Ristiana',
                'periode' => 'Februari 2018',
                'tahun' => 2018,
                'deskripsi_singkat' => 'Tim yang terdiri dari Bayu Veri Amada, Muhammad Dhani Moreno, Muhammad Tegar Saputra, dan Rahma Erin Ristiana berhasil meraih juara 2 tingkat kota/kabupaten dalam ajang POPDA. Ini merupakan pencapaian tim yang solid di olahraga tradisional Indonesia ini.',
                'created_at' => '2025-06-30 12:25:34',
                'updated_at' => '2025-06-30 12:25:34',
            ),
            7 => 
            array (
                'id' => 16,
                'judul' => 'Juara 3 Taekwondo Open Turnamen',
                'pencapai' => 'Yattaqi Abiyyu',
                'periode' => 'Maret 2018',
                'tahun' => 2018,
                'deskripsi_singkat' => 'Yattaqi Abiyyu kembali menunjukkan prestasinya dengan meraih juara 3 nasional dalam kategori cadet putra under 53 kg. Capaian ini menandai keunggulannya di kancah nasional.',
                'created_at' => '2025-06-30 12:26:04',
                'updated_at' => '2025-06-30 12:26:04',
            ),
            8 => 
            array (
                'id' => 17,
                'judul' => 'Juara 3 Pencak Silat IPSI Jawa Tengah',
                'pencapai' => 'Ryan Andre Saputra',
                'periode' => 'April 2018',
                'tahun' => 2018,
                'deskripsi_singkat' => 'Ryan Andre Saputra meraih juara 3 dalam kejuaraan pencak silat tingkat kota/kabupaten. Ia menunjukkan kemampuan bela diri tradisional yang membanggakan.',
                'created_at' => '2025-06-30 12:26:35',
                'updated_at' => '2025-06-30 12:26:35',
            ),
            9 => 
            array (
                'id' => 18,
            'judul' => 'Juara 1 Futsal (SMK Palapa)',
                'pencapai' => 'Tim Futsal SMPN44 Semarang',
                'periode' => 'Mei 2018',
                'tahun' => 2018,
                'deskripsi_singkat' => 'Tim futsal tingkat kecamatan yang terdiri dari Ardhiya Prima Santoso dan rekan-rekannya berhasil meraih juara 1. Prestasi ini mencerminkan kerja sama tim dan skill yang solid di lapangan.',
                'created_at' => '2025-06-30 12:27:12',
                'updated_at' => '2025-06-30 12:27:12',
            ),
            10 => 
            array (
                'id' => 19,
            'judul' => 'Juara 3 Sepak Bola (POPDA)',
                'pencapai' => 'Santos Aji Pamuntun',
                'periode' => 'Juni 2018',
                'tahun' => 2018,
                'deskripsi_singkat' => 'Santos Aji Pamuntun berkontribusi dalam tim sepak bola yang meraih juara 3 dalam POPDA tingkat kota/kabupaten. Prestasi ini menunjukkan daya saing tinggi di ajang olahraga pelajar.',
                'created_at' => '2025-06-30 12:27:41',
                'updated_at' => '2025-06-30 12:27:41',
            ),
            11 => 
            array (
                'id' => 20,
            'judul' => 'Juara 3 Sepak Takraw Putri (POPDA)',
                'pencapai' => 'Tim Sepak Takraw Putri SMPN44 Semarang',
                'periode' => 'Januari 2019',
                'tahun' => 2019,
                'deskripsi_singkat' => 'Tim putri yang terdiri dari Adinda Wahyu Saputri dan rekan-rekannya berhasil meraih juara 3 di ajang POPDA tingkat kota/kabupaten. Ini menunjukkan partisipasi aktif dan prestasi siswa perempuan dalam olahraga tradisional.',
                'created_at' => '2025-06-30 12:29:35',
                'updated_at' => '2025-06-30 12:29:35',
            ),
            12 => 
            array (
                'id' => 21,
            'judul' => 'Juara 1 Sepak Takraw Putra (POPDA)',
                'pencapai' => 'Tim Sepak Takraw Putra SMPN44 Semarang',
                'periode' => 'Januari 2019',
                'tahun' => 2019,
                'deskripsi_singkat' => 'Bayu Virli Amada dan timnya berhasil meraih juara 1 tingkat kota/kabupaten di cabang sepak takraw. Prestasi ini mencerminkan kekompakan dan kemampuan luar biasa mereka dalam olahraga ini.',
                'created_at' => '2025-06-30 12:30:17',
                'updated_at' => '2025-06-30 12:30:17',
            ),
            13 => 
            array (
                'id' => 22,
            'judul' => 'Juara 3 Sepak Takraw Putra (POPDA Karesidenan)',
                'pencapai' => 'Bayu Virli Amada',
                'periode' => 'Februari 2019',
                'tahun' => 2019,
                'deskripsi_singkat' => 'Bayu Virli Amada meraih prestasi individu dengan membawa pulang juara 3 tingkat karesidenan. Ini menunjukkan konsistensinya sebagai atlet takraw yang berprestasi di berbagai level.',
                'created_at' => '2025-06-30 12:31:58',
                'updated_at' => '2025-06-30 12:31:58',
            ),
            14 => 
            array (
                'id' => 23,
                'judul' => 'Juara 3 Musik Tradisional – Festival Ranggawarsita',
                'pencapai' => 'Tim Ekstrakurikuler Musik',
                'periode' => 'Maret 2019',
                'tahun' => 2019,
                'deskripsi_singkat' => 'Dalam ajang Festival Ranggawarsita bertema "Diversity for Unity", siswa berhasil meraih juara 3 pada tingkat provinsi untuk kategori musik tradisional. Prestasi ini mencerminkan kecintaan dan kemampuan mereka dalam melestarikan budaya lokal.',
                'created_at' => '2025-06-30 12:32:54',
                'updated_at' => '2025-06-30 12:32:54',
            ),
            15 => 
            array (
                'id' => 24,
            'judul' => 'Juara 3 Sepak Takraw Putri (POPDA)',
                'pencapai' => 'Adinda Wahyu Saputri',
                'periode' => 'Januari 2020',
                'tahun' => 2020,
                'deskripsi_singkat' => 'Adinda Wahyu Saputri berhasil meraih juara 3 dalam cabang sepak takraw tingkat kabupaten/kota. Prestasi ini menunjukkan konsistensinya di bidang olahraga tradisional.',
                'created_at' => '2025-06-30 12:37:43',
                'updated_at' => '2025-06-30 12:37:43',
            ),
            16 => 
            array (
                'id' => 25,
            'judul' => 'Juara 2 Sepak Takraw Putra (POPDA)',
                'pencapai' => 'Tim Sepak Takraw Putra SMPN44 Semarang',
                'periode' => 'Februari 2020',
                'tahun' => 2020,
                'deskripsi_singkat' => 'Tim putra yang terdiri dari enam siswa, termasuk Muhammad Dhani Moreno, sukses meraih juara 2 tingkat kota/kabupaten. Mereka menunjukkan kerja sama dan teknik yang kuat di lapangan.',
                'created_at' => '2025-06-30 12:38:11',
                'updated_at' => '2025-06-30 12:38:11',
            ),
            17 => 
            array (
                'id' => 26,
            'judul' => 'Juara 3 Sepak Takraw Putra (POPDA) Kendal',
                'pencapai' => 'Muhammad Dhani Moreno',
                'periode' => 'Januari 2020',
                'tahun' => 2020,
                'deskripsi_singkat' => 'Muhammad Dhani Moreno kembali menorehkan prestasi dengan meraih juara 3 di POPDA Kendal. Pencapaian ini mencerminkan konsistensi dan dedikasinya dalam olahraga sepak takraw.',
                'created_at' => '2025-06-30 12:38:34',
                'updated_at' => '2025-06-30 12:38:34',
            ),
            18 => 
            array (
                'id' => 27,
                'judul' => 'Lomba Sholawat/Qosidah',
                'pencapai' => 'Juwita Aprilia Carissa Putri',
                'periode' => 'Januari 2021',
                'tahun' => 2021,
                'deskripsi_singkat' => 'Juwita meraih prestasi dalam lomba Sholawat/Qosidah kategori SD/MI tingkat nasional melalui kompetisi online. Ini menunjukkan bakat dan semangatnya dalam bidang seni religi.',
                'created_at' => '2025-06-30 12:40:47',
                'updated_at' => '2025-06-30 12:40:47',
            ),
            19 => 
            array (
                'id' => 28,
                'judul' => 'Lomba Sepak Bola',
                'pencapai' => 'Astrina Puri Andrian',
                'periode' => 'Februari 2021',
                'tahun' => 2021,
                'deskripsi_singkat' => 'Astrina Puri Andrian berhasil menunjukkan kemampuan sepak bolanya di turnamen tingkat kota/kabupaten. Prestasi ini membuktikan potensi atletik di kalangan siswi.',
                'created_at' => '2025-06-30 12:41:34',
                'updated_at' => '2025-06-30 12:41:34',
            ),
            20 => 
            array (
                'id' => 29,
                'judul' => 'Pramuka Garuda',
                'pencapai' => 'Sicilia Puspita Anggraini',
                'periode' => 'Februari 2021',
                'tahun' => 2021,
                'deskripsi_singkat' => 'Sicilia mendapatkan penghargaan Pramuka Garuda kategori SD/MI di tingkat kota/kabupaten. Pencapaian ini mencerminkan kedisiplinan dan keteladanan dalam kegiatan kepramukaan.',
                'created_at' => '2025-06-30 12:42:04',
                'updated_at' => '2025-06-30 12:42:04',
            ),
            21 => 
            array (
                'id' => 30,
                'judul' => 'Lomba Sholawat/Qosidah',
                'pencapai' => 'Fajda Nur Aisyah',
                'periode' => 'Mei 2021',
                'tahun' => 2021,
                'deskripsi_singkat' => 'Fajda juga meraih prestasi di lomba Sholawat/Qosidah tingkat nasional secara online. Ia menunjukkan dedikasi dalam pelestarian budaya dan spiritualitas melalui seni.',
                'created_at' => '2025-06-30 12:42:27',
                'updated_at' => '2025-06-30 12:42:27',
            ),
            22 => 
            array (
                'id' => 31,
                'judul' => 'Juara 2 Pencak Silat',
            'pencapai' => 'Jerycho Rajads Pratama (VII B)',
                'periode' => 'Januari 2022',
                'tahun' => 2022,
                'deskripsi_singkat' => 'Jerycho Rajads Pratama meraih juara 2 dalam kejuaraan pencak silat tingkat nasional. Ia menunjukkan kemampuan bela diri tradisional yang membanggakan',
                'created_at' => '2025-06-30 12:45:48',
                'updated_at' => '2025-06-30 12:45:48',
            ),
            23 => 
            array (
                'id' => 32,
                'judul' => 'Juara 2 POPDA Cabor Dayung',
                'pencapai' => 'Nayla Christy Diavani',
                'periode' => 'Februari 2022',
                'tahun' => 2022,
                'deskripsi_singkat' => 'Nayla Christy Diavani meraih juara 2 dalam POPDA tingkat kota/kabupaten. Prestasi ini menunjukkan daya saing tinggi di ajang olahraga pelajar.',
                'created_at' => '2025-06-30 12:47:02',
                'updated_at' => '2025-06-30 12:47:02',
            ),
            24 => 
            array (
                'id' => 33,
                'judul' => 'Juara Harapan 1 Lomba Senandung Sholawat',
                'pencapai' => 'Juwita Aprilia Carissa',
                'periode' => 'Maret 2022',
                'tahun' => 2022,
                'deskripsi_singkat' => 'Juwita meraih prestasi dalam lomba Senandung Sholawat tingkat Kota Semarang. Ini menunjukkan bakat dan semangatnya dalam bidang seni religi.',
                'created_at' => '2025-06-30 12:48:39',
                'updated_at' => '2025-06-30 12:48:39',
            ),
            25 => 
            array (
                'id' => 34,
                'judul' => 'Juara 3 Bulutangkis tunggal Pemula Putra',
                'pencapai' => 'Sae Alfin Nuril Hidayah',
                'periode' => 'Januari 2024',
                'tahun' => 2024,
                'deskripsi_singkat' => 'Dalam kejuaraan bulutangkis tunggal pemula putra di ajang Fun Game Badminton Competition Banjarnegara, Sae berhasil meraih juara 3. Ini merupakan pencapaian yang membanggakan dalam cabang olahraga kompetitif.',
                'created_at' => '2025-06-30 12:52:23',
                'updated_at' => '2025-06-30 12:52:23',
            ),
            26 => 
            array (
                'id' => 35,
                'judul' => 'Juarai 1 Jambore Kontingen Kwarcab',
                'pencapai' => 'Tafazzul Rafka Wahidduzaman',
                'periode' => 'Januari 2024',
                'tahun' => 2024,
                'deskripsi_singkat' => 'Tafazzul menjadi juara 1 sebagai bagian dari kontingen Kwarcab Kota Semarang dalam Jambore Daerah XVI tingkat Jawa Tengah. Prestasi ini menunjukkan kepemimpinannya di bidang kepramukaan.',
                'created_at' => '2025-06-30 12:53:16',
                'updated_at' => '2025-06-30 12:53:16',
            ),
            27 => 
            array (
                'id' => 36,
                'judul' => 'Juara 1 Pencak Silat – Kendal Open Championship',
                'pencapai' => 'Waode Anggun R',
                'periode' => 'Maret 2024',
                'tahun' => 2024,
                'deskripsi_singkat' => 'Waode meraih juara 1 dalam kategori Laga Kelas B Putri Pra Remaja. Prestasi ini menunjukkan kemampuan bela dirinya yang luar biasa di ajang pencak silat regional.',
                'created_at' => '2025-06-30 12:54:34',
                'updated_at' => '2025-06-30 12:54:34',
            ),
            28 => 
            array (
                'id' => 37,
                'judul' => 'Juara 1 Pencak Silat Kendal Open Championship',
                'pencapai' => 'Anasrul Ardiansah',
                'periode' => 'Maret 2024',
                'tahun' => 2024,
                'deskripsi_singkat' => 'Anasrul tampil gemilang di kategori Laga Kelas K Putra Pra Remaja dan berhasil membawa pulang medali emas. Ini menjadi bukti dari ketekunan dan dedikasinya dalam seni bela diri.',
                'created_at' => '2025-06-30 12:55:27',
                'updated_at' => '2025-06-30 12:55:27',
            ),
        ));
        
        
    }
}