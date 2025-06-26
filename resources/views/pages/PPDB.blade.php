@extends('layouts.app')
@section('content')
  <!-- PPDB Section -->
  <section>
    <h2 class="text-4xl font-extrabold text-[#B7669A] mb-8 text-center border-b-4 border-[#6F2C5C] pb-3">
      Pendaftaran Peserta Didik Baru (PPDB)
    </h2>

    <div class="bg-purple-50 p-8 rounded-lg shadow-md mb-12 border">
      <h3 class="text-4xl font-bold text-[#B7669A] mb-6 text-center border-b-2 border-[#6F2C5C] pb-2 w-fit mx-auto">
        Alur Pendaftaran
      </h3>
      <img class="block mx-auto" src="{{ asset('assets/PPDB/alur pendaftaran.png') }}" alt="Prestasi Matematika" </div>

      <div class="text-center">
        <p class="text-gray-800 text-xl mb-6">
          Siap untuk menjadi bagian dari keluarga besar SMPN 44 Semarang?
        </p>
        <a href="https://ppd.semarangkota.go.id/smp" target="_blank"
          class="bg-[#6F2C5C] hover:bg-green-700 text-white font-bold py-4 px-8 rounded-full text-2xl shadow-xl transition-all duration-300 transform hover:scale-105 inline-flex items-center">
          Daftar Sekarang! <i class="fas fa-external-link-alt ml-3"></i>
        </a>
        <p class="text-gray-500 text-sm mt-3">
          *Link pendaftaran akan aktif selama periode PPDB.
        </p>
      </div>
  </section>
@endsection
