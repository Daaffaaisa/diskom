@extends('layouts.app')
@section('content')
  <!-- Profile Section -->
  <section>
    <h2 class="text-4xl font-extrabold text-[#B7669A] mb-8 text-center border-b-4 border-[#6F2C5C] pb-3">
      Profil Sekolah
    </h2>

    <!-- Visi Misi -->
    <div class="bg-purple-50 p-8 rounded-lg shadow-md mb-12 border ">
      <h3 class="text-3xl font-bold text-[#B7669A] mb-6 text-center border-b-2 border-[#6F2C5C] pb-2 inline-block">
        Visi dan Misi
      </h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
        <div>
          <h4 class="text-2xl font-semibold text-gray-800 mb-4">Visi</h4>
          <p class="text-gray-700 leading-relaxed">
            Mewujudkan peserta didik "Bertaqwa, Berkarakter, Berprestasi, dan Cinta Lingkungan"
          </p>
        </div>
        <div>
          <h4 class="text-2xl font-semibold text-gray-800 mb-4">Misi</h4>
          <ul class="list-disc list-inside text-gray-700 leading-relaxed space-y-2">
            <li>
              Mewujudkan generasi yang berkarakter religius, jujur, dan berakhlak mulia.
            </li>
            <li>
              Mewujudkan budaya kerja keras dan kerja ikhlas.
            </li>
            <li>Mewujudkan generasi yang memiliki jiwa mandiri, sehar, dan bertanggung jawab.</li>
            <li>
              Mewujudkan kehiudpan sekolah yang berprestasi, disiplin, cerdas, dan terampil.
            </li>
            <li>
              Mewujudkan sekolah yang demokratis, berbudaya nasional, dan berdaya saing global.
            </li>
            <li>
              Mewujudkan tercapainya 8 standar pendidikan yang kreatif, inovatif, efektif, dan efisien.
            </li>
            <li>
              Mewujudkan standar pelayanan yang ramah, transparan, dan akuntabel.
            </li>
            <li>
              Mewujudkan lingkungan sekolah yang bersih, indah, rindang, nyaman, dan menyenangkan.
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Profil Guru dan Tendik -->
    <div class="mb-12">
      <h3 class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
        Profil Guru dan Tenaga Kependidikan
      </h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

        <!-- Kepala Sekolah-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/kepsek.jpg') }}" alt="Foto Guru A"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Y. Hesty Padmaratnawati, S.Pd.
          </h4>
          <p class="text-blue-600 text-sm mb-2">Kepala Sekolah</p>
        </div>

        <!--Koordinator Administrasi-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/koordinator administrasi.png') }}" alt="Foto Guru B"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Drs. Budi Santoso
          </h4>
          <p class="text-blue-600 text-sm mb-2">Koordinator Administrasi</p>
        </div>

        <!-- Guru BK 1-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru bk.png') }}" alt="Foto Tendik C"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Upik Kumala Dewi N., S.Psi
          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru BK</p>
        </div>

        <!-- Guru BK 2-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru bk2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            RR. Reni Hartati, M.Pd.

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru BK</p>
        </div>

        <!-- Guru Inggris 1-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru inggris.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Tri Yulistiyanto,S.Pd.

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Bahasa Inggris</p>
        </div>

        <!-- Guru Inggris 2-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru inggris2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Lulus Aji Prihanto,S.Pd

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Bahasa Inggris</p>
        </div>

        <!-- Guru Indonesia 1-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru indo.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Ibnu Budi Santoso,S.Pd
          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Bahasa Indonesia</p>
        </div>

        <!-- Guru Indonesia 2-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru indo2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Arif Aji Mastoto,M.Pd
          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Bahasa Indonesia</p>
        </div>

        <!-- Guru Matematika-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru mtk.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Dwi Indarwanti,S.Pd

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Matematika</p>
        </div>

        <!-- Guru Matematika 2-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru mtk2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Muntiarsih, S.Pd.

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Matematika</p>
        </div>

        <!-- Guru IPA 1-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru ipa.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Tika Herlita Putri, S.Pd
          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Ilmu Pengetahuan Alam</p>
        </div>

        <!-- Guru IPA 2-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru ipa2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Supardjo, S.Pd.

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Ilmu Pengetahuan Alam</p>
        </div>

        <!-- Guru IPS 1-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru ips.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Drs.Yusuf Noegroho, S.Pd.

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Bahasa Ilmu Pengetahuan Sosial/p>
        </div>

        <!-- Guru IPS 2-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru ips2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Retno Sri Haryani, S.Pd.
          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Ilmu Pengetahuan Sosial</p>
        </div>

        <!-- Guru PAI-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru pai.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Dra. Ismiyatun

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Pendidikan Agama Islam</p>
        </div>

        <!-- Guru PJOK-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru pjok.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Pujaningsih,S.Pd
          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Penjasorkes</p>
        </div>

        <!-- Guru PKN-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru pkn.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Dra. Irstianah

          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Pendidikan Kewarga Negaraan</p>
        </div>

        <!-- Guru Prakarya-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru prakarya.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Riandi Kusumawardani, S.Kom
          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Prakarya</p>
        </div>

        <!-- Guru Senbud-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/guru seni budaya.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Tiur Wulan Anggraini, S.Pd
          </h4>
          <p class="text-blue-600 text-sm mb-2">Guru Seni Budaya</p>
        </div>

        <!-- TU 1-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/TU1.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Syifaun Nurul Umam
          </h4>
          <p class="text-blue-600 text-sm mb-2">Staff Tata Usaha</p>
        </div>

        <!-- TU 2-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/TU2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Nur Khasanah, S.Kom.
          </h4>
          <p class="text-blue-600 text-sm mb-2">Staff Tata Usaha</p>
        </div>

        <!-- TU 3-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/TU3.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Tiara Indah Sitaresmi, S. I. Pust.
          </h4>
          <p class="text-blue-600 text-sm mb-2">Staff Tata Usaha</p>
        </div>

        <!-- TU 4-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/TU4.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Siti Anisah, S.pd

          </h4>
          <p class="text-blue-600 text-sm mb-2">Staff Tata Usaha</p>
        </div>

        <!-- Keamanan -->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/keamanan.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Mintarso
          </h4>
          <p class="text-blue-600 text-sm mb-2">Petugas Keamanan</p>
        </div>

        <!-- Keamanan 2 -->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/keamanan2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Angga Wahyu Nirmala

          </h4>
          <p class="text-blue-600 text-sm mb-2">Petugas Keamanan</p>
        </div>

        <!-- Keamanan 3 -->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/keamanan3.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Putra Bagas Riantaji

          </h4>
          <p class="text-blue-600 text-sm mb-2">Petugas Keamanan</p>
        </div>

        <!-- Kebersihan-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/kebersihan.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Agus Supriyanto, S.Pd.

          </h4>
          <p class="text-blue-600 text-sm mb-2">Pramu Kebersihan</p>
        </div>

        <!-- Kebersihan 2-->
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/kebersihan2.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Angga Widi Pujianto
          </h4>
          <p class="text-blue-600 text-sm mb-2">Pramu Kebersihan</p>
        </div>

        <!-- Kebersihan 3-->
        
        <div
          class="items-center bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
          <img src="{{ asset('assets/profile/foto guru/kebersihan3.png') }}" alt="Foto Tendik D"
            class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
          <h4 class="text-xl font-semibold text-gray-800 mb-1">
            Santoso
          </h4>
          <p class="text-blue-600 text-sm mb-2">Pramu Kebersihan</p>
        </div>

      </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="bg-purple-50 p-8 rounded-lg shadow-md border">
      <h3 class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
        Struktur Organisasi
      </h3>
      <div class="flex justify-center items-center">
        <img src="{{ asset('assets/profile/struktur organisasi/struktur.png') }}" alt="Struktur Organisasi Sekolah"
          class="max-w-full h-auto rounded-lg shadow-lg border border-gray-300" />
      </div>
    </div>
  </section>
@endsection
