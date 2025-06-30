<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeritasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('beritas')->delete();
        
        \DB::table('beritas')->insert(array (
            0 => 
            array (
                'id' => 15,
                'judul' => 'Selamat dan Sukses. Kejuaraan Pencak Silat SMP Negeri 44 Semarang Tahun 2023',
                'tanggal' => '2023-03-20',
                'konten' => 'Siswa-siswi SMP Negeri 44 Semarang kembali menorehkan prestasi membanggakan dalam ajang pencak silat tingkat kota dan kejuaraan umum. Tiara Qonita Artanti berhasil meraih Juara 1 pada ajang POPDA Tingkat Kota Semarang, menunjukkan kemampuan dan ketekunannya dalam bela diri.

Tak kalah membanggakan, dalam Lawang Sewu Championship, dua siswa lainnya turut meraih prestasi. Riko Nova Saputra berhasil menyabet Juara 2, sementara Daniz Aditya W. meraih Juara 3.',
                'gambar' => '["assets/berita_images/1751288488_68628aa85b203.jpeg", "assets/berita_images/1751288488_68628aa85bba4.jpeg", "assets/berita_images/1751288488_68628aa85c2cf.jpeg", "assets/berita_images/1751288488_68628aa85c9f9.jpeg"]',
                'created_at' => '2025-06-30 13:01:28',
                'updated_at' => '2025-06-30 13:12:06',
            ),
            1 => 
            array (
                'id' => 16,
                'judul' => 'Gelar Karya P5 Bersinergi Belajar dan Berkarya Menumbuhkan Kebhinekaan Global SMP Negeri 44 Semarang.',
                'tanggal' => '2024-05-08',
            'konten' => 'SMP Negeri 44 Semarang sukses menggelar kegiatan Gelar Karya P5 (Projek Penguatan Profil Pelajar Pancasila) dengan tema “Bersinergi Belajar dan Berkarya Menumbuhkan Kebhinekaan Global.” Kegiatan ini menjadi wadah bagi siswa untuk menampilkan hasil karya kreatif yang mencerminkan nilai-nilai toleransi, gotong royong, dan semangat kebhinekaan.',
                'gambar' => '["assets/berita_images/1751288948_68628c742d7c1.jpeg", "assets/berita_images/1751288948_68628c742e223.jpeg", "assets/berita_images/1751288948_68628c742e907.jpeg", "assets/berita_images/1751288948_68628c742ef39.jpeg", "assets/berita_images/1751288948_68628c742f5a6.jpeg"]',
                'created_at' => '2025-06-30 13:09:08',
                'updated_at' => '2025-06-30 13:09:08',
            ),
            2 => 
            array (
                'id' => 17,
                'judul' => 'Selamat Hari Kebangkitan Nasional 20 Mei 2023',
                'tanggal' => '2023-05-20',
                'konten' => 'SMP Negeri 44 Semarang memperingati Hari Kebangkitan Nasional sebagai momentum untuk menumbuhkan semangat persatuan dan cinta tanah air di kalangan siswa. Melalui upacara dan kegiatan reflektif, seluruh warga sekolah diajak mengenang perjuangan para tokoh bangsa. Semangat kebangkitan ini menjadi inspirasi untuk terus belajar, berprestasi, dan berkontribusi bagi Indonesia.',
                'gambar' => '["assets/berita_images/1751289218_68628d8251f85.jpeg", "assets/berita_images/1751289218_68628d82527d3.jpeg", "assets/berita_images/1751289218_68628d8252f33.jpeg", "assets/berita_images/1751289218_68628d825360e.jpeg"]',
                'created_at' => '2025-06-30 13:13:38',
                'updated_at' => '2025-06-30 13:13:38',
            ),
            3 => 
            array (
                'id' => 18,
            'judul' => 'Partisipasi SMP Negeri 44 Semarang dalam kegiatan Joget Bareng Semarang Rumah (K)ITA dalam rangka Hari Jadi Kota Semarang ke 476',
                'tanggal' => '2024-06-30',
            'konten' => 'SMP Negeri 44 Semarang turut meriahkan perayaan Hari Jadi Kota Semarang ke-476 dengan mengikuti kegiatan Joget Bareng Semarang Rumah (K)ITA. Siswa dan guru berpartisipasi aktif menampilkan kekompakan dan semangat kebersamaan. Kegiatan ini menjadi momen menyenangkan sekaligus mempererat rasa cinta terhadap kota Semarang.',
                'gambar' => '["assets/berita_images/1751289304_68628dd8e9430.jpeg", "assets/berita_images/1751289304_68628dd8e9b90.jpeg", "assets/berita_images/1751289304_68628dd8ea2fd.jpeg", "assets/berita_images/1751289304_68628dd8eab17.jpeg"]',
                'created_at' => '2025-06-30 13:15:04',
                'updated_at' => '2025-06-30 13:15:04',
            ),
            4 => 
            array (
                'id' => 19,
                'judul' => 'Upacara peringatan Hari Pendidikan Nasional dan Hari Jadi Kota Semarang ke 476.',
                'tanggal' => '2023-02-22',
                'konten' => 'SMP Negeri 44 Semarang melaksanakan upacara gabungan untuk memperingati Hari Pendidikan Nasional dan Hari Jadi Kota Semarang ke-476 dengan khidmat. Kegiatan ini menjadi momen refleksi penting tentang peran pendidikan dalam membangun generasi yang cerdas dan cinta daerah. Semangat nasionalisme dan kebanggaan terhadap kota Semarang ditanamkan kepada seluruh peserta didik.',
                'gambar' => '["assets/berita_images/1751289371_68628e1ba7a0d.jpeg", "assets/berita_images/1751289371_68628e1ba83a6.jpeg", "assets/berita_images/1751289371_68628e1ba8cbf.jpeg"]',
                'created_at' => '2025-06-30 13:16:11',
                'updated_at' => '2025-06-30 13:16:11',
            ),
            5 => 
            array (
                'id' => 20,
                'judul' => 'Selamat dan Sukses menempuh Ujian Sekolah Tahun Ajaran 2022/2023 SMP Negeri 44 Semarang 3 Mei 2023',
                'tanggal' => '2023-05-03',
                'konten' => 'SMP Negeri 44 Semarang mengucapkan selamat dan sukses kepada seluruh siswa kelas IX yang sedang menempuh Ujian Sekolah Tahun Ajaran 2022/2023. Semoga pelaksanaan ujian berjalan lancar dan menjadi langkah awal menuju masa depan yang gemilang. Tetap semangat, jujur, dan percaya diri dalam mengerjakan setiap soal.
Kami bangga atas perjuangan kalian',
                'gambar' => '["assets/berita_images/1751289452_68628e6c3cae9.jpeg", "assets/berita_images/1751289452_68628e6c3d242.jpeg"]',
                'created_at' => '2025-06-30 13:17:32',
                'updated_at' => '2025-06-30 13:17:32',
            ),
        ));
        
        
    }
}