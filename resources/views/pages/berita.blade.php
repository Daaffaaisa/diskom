@extends('layouts.app')
@section('content')
  <!-- Berita Section -->
  <section>
    <h2 class="text-4xl font-extrabold text-[#B7669A] mb-8 text-center border-b-4 border-[#6F2C5C] pb-3">
      Berita dan Kegiatan Sekolah
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!--Berita 1-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news1/1.jpeg') }}" alt="Banner 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news1/2.jpeg') }}" alt="Banner 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news1/3.jpeg') }}" alt="Banner 2"
                class="w-full h-full object-cover" />
            </div>
          </div>
          <button
            class="absolute top-1/2 left-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 prev-btn"
            title="Sebelumnya">
            &#10094;
          </button>
          <button
            class="absolute top-1/2 right-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 next-btn"
            title="Berikutnya">
            &#10095;
          </button>
        </div>
        <!-- Isi Card -->
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Selamat dan Sukses. Kejuaraan Pencak Silat SMP Negeri 44 Semarang Tahun 2023
          </h4>
          <p class="text-gray-600 text-sm mb-4">Senin, 10 Juni 2024</p>
          <p class="text-gray-700 leading-relaxed">
            Selamat dan Sukses. Kejuaraan Pencak Silat SMP Negeri 44 Semarang Tahun 2023
            Tiara Qonita Artanti Juara 1 POPDA Tingkat Kota Semarang
            Riko Nova Saputra Juara 2 Lawang Sewu Championship
            Daniz Aditya W. Juara 3 Lawang Sewu Championship
          </p>
        </div>
      </div>

      <!--Berita 2-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/berita/berita3/1.jpeg') }}" alt="Banner 2" class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/berita/berita3/2.jpeg') }}" alt="Banner 2" class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/berita/berita3/3.jpeg') }}" alt="Banner 2" class="w-full h-full object-cover" />
            </div>
          </div>
          <button
            class="absolute top-1/2 left-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 prev-btn"
            title="Sebelumnya">
            &#10094;
          </button>
          <button
            class="absolute top-1/2 right-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 next-btn"
            title="Berikutnya">
            &#10095;
          </button>
        </div>
        <!-- Isi Card -->
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Partisipasi SMP Negeri 44 Semarang dalam kegiatan Joget Bareng Semarang Rumah (K)ITA dalam rangka Hari Jadi
            Kota Semarang ke 476 di sepanjang jalan Pemuda Semarang
          </h4>
          <p class="text-gray-600 text-sm mb-4">Senin, 10 Juni 2024</p>
          <p class="text-gray-700 leading-relaxed">
            Partisipasi SMP Negeri 44 Semarang dalam kegiatan Joget Bareng Semarang Rumah (K)ITA dalam rangka Hari Jadi
            Kota Semarang ke 476 di sepanjang jalan Pemuda Semarang (Gedung Lawang Sewu s.d Paragon Mall).
            Semarang semakin hebat.
          </p>
        </div>
      </div>

      <!--Berita 3-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news2/1.jpeg') }}" alt="Paskibra 1"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news2/2.jpeg') }}" alt="Paskibra 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news2/3.jpeg') }}" alt="Paskibra 3"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news2/4.jpeg') }}" alt="Paskibra 3"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news2/5.jpeg') }}" alt="Paskibra 3"
                class="w-full h-full object-cover" />
            </div>
          </div>
          <button
            class="absolute top-1/2 left-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 prev-btn"
            title="Sebelumnya">
            &#10094;
          </button>
          <button
            class="absolute top-1/2 right-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 next-btn"
            title="Berikutnya">
            &#10095;
          </button>
        </div>
        <!-- Isi Card -->
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Gelar Karya P5 Bersinergi Belajar dan Berkarya Menumbuhkan Kebhinekaan Global SMP Negeri 44 Semarang.
          </h4>
          <p class="text-gray-600 text-sm mb-4">Senin, 10 Juni 2024</p>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Gelar Karya P5 Bersinergi Belajar dan Berkarya Menumbuhkan Kebhinekaan Global SMP Negeri 44 Semarang.
          </p>
        </div>
      </div>

      <!--Berita 4-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/berita/berita4/1.jpeg') }}" alt="Musik 1" class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/berita/berita4/2.jpeg') }}" alt="Musik 2" class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/berita/berita4/3.jpeg') }}" alt="Musik 3" class="w-full h-full object-cover" />
            </div>
          </div>

          <button
            class="absolute top-1/2 left-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 prev-btn"
            title="Sebelumnya">
            &#10094;
          </button>
          <button
            class="absolute top-1/2 right-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 next-btn"
            title="Berikutnya">
            &#10095;
          </button>
        </div>
        <!-- Isi Card -->
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Upacara peringatan Hari Pendidikan Nasional dan Hari Jadi Kota Semarang ke 476.
          </h4>
          <p class="text-gray-600 text-sm mb-4">Senin, 10 Juni 2024</p>
          <p class="text-gray-700 leading-relaxed">
            Upacara peringatan Hari Pendidikan Nasional dan Hari Jadi Kota Semarang ke 476.
          </p>
        </div>
      </div>

      <!--Berita 5-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/berita/berita5/1.jpeg') }}" alt="Pramuka 1"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/berita/berita5/2.jpeg') }}" alt="Pramuka 2"
                class="w-full h-full object-cover" />
            </div>
          </div>
          <button
            class="absolute top-1/2 left-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 prev-btn"
            title="Sebelumnya">
            &#10094;
          </button>
          <button
            class="absolute top-1/2 right-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 next-btn"
            title="Berikutnya">
            &#10095;
          </button>
        </div>
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">Selamat dan Sukses menempuh Ujian Sekolah Tahun Ajaran
            2022/2023 SMP Negeri 44 Semarang 3 Mei 2023 - 10 Mei 2023 dengan menggunakan pijar sekolah.</h4>
          <p class="text-gray-600 text-sm mb-4">Senin, 10 Juni 2024</p>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Selamat dan Sukses menempuh Ujian Sekolah Tahun Ajaran 2022/2023 SMP Negeri 44 Semarang
            3 Mei 2023 - 10 Mei 2023 dengan menggunakan pijar sekolah.
            Semoga diberikan kemudahan, kelancaran, kecerdasan dan mendapatkan hasil yang terbaik. </p>
        </div>
      </div>

      <!-- Berita 6 -->
      <div
        class="group relative bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news3/1.jpeg') }}" alt="Banner 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news3/2.jpeg') }}" alt="Banner 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/beranda/latest news3/3.jpeg') }}" alt="Banner 2"
                class="w-full h-full object-cover" />
            </div>
          </div>
          <!-- Tombol Panah -->
          <button
            class="absolute top-1/2 left-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 prev-btn"
            title="Sebelumnya">
            &#10094;
          </button>
          <button
            class="absolute top-1/2 right-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 next-btn"
            title="Berikutnya">
            &#10095;
          </button>
        </div>
        <!-- Isi Card -->
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Selamat Hari Kebangkitan Nasional 20 Mei 2023
          </h4>
          <p class="text-gray-600 text-sm mb-4">Senin, 10 Juni 2024</p>
          <p class="text-gray-700 leading-relaxed">
            SMP Negeri 44 Semarang melaksanakan Upacara Peringatan Hari Kebangkitan Nasional hari Senin, 22 Mei 2023.
            Bangkit menuju kebaikan.
            Mulailah dari diri kita sendiri.
            Instrospeksi diri. Mulai dari hal kecil.
            Yuk, mulai dari diri sendiri dan bersama - sama bangkit dan berkarya untuk bangsa ini.
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
