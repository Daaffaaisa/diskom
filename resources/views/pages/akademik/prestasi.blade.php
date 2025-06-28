@extends('layouts.app')
@section('content')
  <section>
    <h3 class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
      Prestasi Siswa
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      {{-- Loop untuk menampilkan daftar tahun prestasi dari database --}}
      @forelse($years as $yearData)
        {{-- $yearData akan berisi objek {tahun: 2023} --}}
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
          {{-- Gambar placeholder untuk card tahun --}}
          <img src="{{ asset('images/placeholder-prestasi-tahun.jpg') }}" alt="Prestasi Siswa Tahun {{ $yearData->tahun }}"
            class="w-full h-48 object-cover" /> {{-- PERBAIKAN DI SINI --}}
          <div class="p-6">
            <h4 class="text-xl font-semibold text-gray-800 mb-3">
              Kumpulan Prestasi Siswa Siswa SMPN44 pada Tahun {{ $yearData->tahun }}
            </h4> {{-- PERBAIKAN DI SINI --}}
            <p class="text-gray-700 leading-relaxed">
              Lihat semua prestasi yang diraih siswa-siswi SMPN 44 pada tahun {{ $yearData->tahun }}.
              <br>
              {{-- Link ke halaman detail prestasi per tahun --}}
              <a href="{{ url('/pages/akademik/prestasi/' . $yearData->tahun) }}" {{-- PERBAIKAN DI SINI --}}
                class="mt-4 inline-block text-[#B7669A] hover:text-[#E9C5DC] font-semibold transition-colors duration-200">Baca
                Selengkapnya <i class="fas fa-arrow-right ml-1"></i></a>
            </p>
          </div>
        </div>
      @empty
        <p class="col-span-full text-center py-8 text-lg text-gray-600">Belum ada data prestasi yang tercatat.</p>
      @endforelse

    </div>
  </section>
@endsection
