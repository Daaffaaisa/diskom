@extends('layouts.app')
@section('content')
  <section>
    <h3 class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
      Prestasi Siswa
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      {{-- Definisikan daftar warna yang menarik (Background & Text Color) --}}
      <?php
      $colorOptions = [
          ['bg' => '3498db', 'text' => 'ffffff'], // Biru Cerah
          ['bg' => '2ecc71', 'text' => 'ffffff'], // Hijau Emerald
          ['bg' => 'e74c3c', 'text' => 'ffffff'], // Merah Bata
          ['bg' => '9b59b6', 'text' => 'ffffff'], // Ungu Amethyst
          ['bg' => 'f1c40f', 'text' => '000000'], // Kuning (teks hitam)
          ['bg' => '1abc9c', 'text' => 'ffffff'], // Biru Laut
          ['bg' => 'f39c12', 'text' => 'ffffff'], // Oranye Cerah
          ['bg' => '34495e', 'text' => 'ffffff'], // Abu-abu Gelap
          ['bg' => 'c0392b', 'text' => 'ffffff'], // Merah Tua
          ['bg' => '7f8c8d', 'text' => 'ffffff'], // Abu-abu Sedang
      ];
      ?>

      {{-- Loop untuk menampilkan daftar tahun prestasi dari database --}}
      @forelse($years as $yearData)
        <?php
        // Pilih warna dari daftar berdasarkan tahun
        // Ini akan memberikan warna yang konsisten untuk setiap tahun
        $colorIndex = $yearData->tahun % count($colorOptions);
        $selectedColor = $colorOptions[$colorIndex];
        
        $bgColor = $selectedColor['bg'];
        $textColor = $selectedColor['text'];
        ?>
        <div
          class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">

          {{-- Gambar placeholder untuk card tahun dengan warna dinamis --}}
          <img src="https://placehold.co/600x400/{{ $bgColor }}/{{ $textColor }}?text={{ $yearData->tahun }}"
            alt="Prestasi Siswa Tahun {{ $yearData->tahun }}" class="w-full h-48 object-cover" />

          <div class="p-6">
            <h4 class="text-xl font-semibold text-gray-800 mb-3">
              Kumpulan Prestasi Siswa Siswa SMPN44 pada Tahun {{ $yearData->tahun }}
            </h4>
            <p class="text-gray-700 leading-relaxed">
              Lihat semua prestasi yang diraih siswa-siswi SMPN 44 pada tahun {{ $yearData->tahun }}.
              <br>
              {{-- Link ke halaman detail prestasi per tahun --}}
              <a href="{{ url('/pages/akademik/prestasi/' . $yearData->tahun) }}"
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
