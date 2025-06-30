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
        @forelse ($guruTendik as $item)
          <div
            class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 text-center p-6 transform hover:scale-105 transition-transform duration-300">
            <img src="{{ asset($item->foto) }}" alt="Foto {{ $item->nama }}"
              class="w-28 h-28 rounded-full mx-auto mb-4 object-cover border-4 border-purple-300" />
            <h4 class="text-xl font-semibold text-gray-800 mb-1">{{ $item->nama }}</h4>
            <p class="text-blue-600 text-sm mb-2">{{ $item->jabatan }}</p>
          </div>
        @empty
          <p class="text-center text-gray-500 col-span-full">Belum ada data guru/tendik.</p>
        @endforelse
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
