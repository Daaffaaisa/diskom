@extends('layouts.app')
@section('content')
  <!-- Prestasi Section (Child of Akademik) -->
  <section>
    <h3 class="text-3xl font-bold text-blue-700 mb-8 text-center border-b-2 border-blue-400 pb-2">
      Prestasi Siswa 2017
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Contoh Card Prestasi -->
      <div
        class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <img src="https://placehold.co/400x250/87CEEB/000000?text=Juara+Taekwondo" alt="Prestasi Matematika"
          class="w-full h-48 object-cover" />
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Juara 1 Taekwondo Palangan Open Cup
          </h4>
          <p class="text-gray-600 text-sm mb-4">
            Oleh: Yattaqi Abiyyu - Mei 2018
          </p>
          <p class="text-gray-700 leading-relaxed">
            Yattaqi Abiyyu berhasil mengharumkan nama sekolah dengan meraih
            juara pertama dalam ajang Palangan Open Cup tingkat provinsi.
            Selamat!
            <br>
        </div>
      </div>

      <div
        class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <img src="https://placehold.co/400x250/FFDAB9/000000?text=Juara+Sepak+Takraw" alt="Prestasi Puisi"
          class="w-full h-48 object-cover" />
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Juara 2 POPDA Sepak Takraw
          </h4>
          <p class="text-gray-600 text-sm mb-4">
            Oleh: Bayu Verli Amanda, Muhammad Dhani Moreno, Muhammad Tegar Saputra, Rahma Erin Ristina - April 2018
          </p>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Bayu Verli dan tim menunjukkan bakatnya dalam olahraga dengan meraih juara
            kedua lomba POPDA Sepak Takraw tingkat kabupaten/Kota Semarang.
          </p>
        </div>
      </div>

      <div
        class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <img src="https://placehold.co/400x250/FBD8E6/000000?text=Juara+Taekwondo" alt="Prestasi Bulu Tangkis"
          class="w-full h-48 object-cover" />
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Juara 3 Taekwondo Open Tournament 2018
          </h4>
          <p class="text-gray-600 text-sm mb-4">
            Oleh: Yattaqi Abiyyu - Maret 2018
          </p>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Yattaqi Abiyyu berhasil mengharumkan nama sekolah dengan meraih
            juara ketiga dalam ajang Taekwondo Open Tournamnet tingkat nasional.
            Selamat!
          </p>
        </div>
      </div>

      <div
        class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <img src="https://placehold.co/400x250/EAD8E6/000000?text=Juara+Pencak+Silat" alt="Prestasi Bulu Tangkis"
          class="w-full h-48 object-cover" />
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Juara 3 Pencak Silat IPSI Jawa Tengah
          </h4>
          <p class="text-gray-600 text-sm mb-4">
            Oleh: Ryan Andre Saputra - Maret 2018
          </p>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Ryan Andre Saputra berhasil mengharumkan nama sekolah dengan meraih
            juara ketiga dalam ajang Taekwondo Open Tournamnet tingkat nasional.
            Selamat!
          </p>
        </div>
      </div>

      <div
        class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <img src="https://placehold.co/400x250/DDD8E6/000000?text=Juara+Futsal" alt="Prestasi Bulu Tangkis"
          class="w-full h-48 object-cover" />
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Juara 1 Futsal (SMK Palapa)
          </h4>
          <p class="text-gray-600 text-sm mb-4">
            Oleh: Tim SMPN44 - Maret 2018
          </p>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Tim SMPN44 berhasil mengharumkan nama sekolah dengan meraih
            juara pertama dalam ajang tournament futsal tingkat kecamatan.
            Selamat!
          </p>
        </div>
      </div>

      <div
        class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <img src="https://placehold.co/400x250/BCD1E6/000000?text=Juara+Sepakbola" alt="Prestasi Bulu Tangkis"
          class="w-full h-48 object-cover" />
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Juara 3 POPDA Sepakbol 2018
          </h4>
          <p class="text-gray-600 text-sm mb-4">
            Oleh: Santos Aji - Maret 2018
          </p>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Santos Aji berhasil mengharumkan nama sekolah dengan meraih
            juara ketiga dalam ajang POPDA Sepak bola tingkat Kota/Kabupaten Semarang.
            Selamat!
          </p>
        </div>
      </div>
      <a href="/pages/akademik/prestasi"
        class="text-2xl mt-4 inline-block text-blue-600 hover:text-blue-800 font-semibold transition-colors duration-200">Kembali <i class="fas fa-arrow-left mt-4"></i></a>
      <!-- Tambahkan lebih banyak card prestasi di sini -->
    </div>
  </section>
@endsection
