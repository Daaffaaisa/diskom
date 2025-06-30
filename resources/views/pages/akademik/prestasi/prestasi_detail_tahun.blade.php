@extends('layouts.app')

@section('content')
  <section class="container mx-auto px-4 py-8">
    <h3 class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
      Prestasi Siswa Tahun {{ $year }}
    </h3>

    {{-- Tombol kembali ke halaman daftar tahun --}}
    <div class="mb-8 text-center">
      <a href="{{ route('prestasi.public.index') }}"
        class="inline-block bg-[#6F2C5C] text-white py-2 px-4 rounded-full hover:bg-[#B7669A] transition-colors duration-200">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Tahun
      </a>
    </div>

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

      {{-- Loop untuk menampilkan prestasi dari database untuk tahun tertentu --}}
      @forelse($prestasis as $prestasi)
        <?php
        // Pilih warna dari daftar berdasarkan tahun
        // Ini akan memberikan warna yang konsisten untuk setiap tahun
        $colorIndex = crc32($prestasi->judul) % count($colorOptions);
        $selectedColor = $colorOptions[$colorIndex];
        
        $bgColor = $selectedColor['bg'];
        $textColor = $selectedColor['text'];
        ?>
        <div
          class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
          <div class="relative w-full h-48 overflow-hidden">
            <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
              {{-- PERBAIKAN DI SINI: Gunakan is_array() --}}
              @if ($prestasi->gambar && is_array($prestasi->gambar) && count($prestasi->gambar) > 0)
                @foreach ($prestasi->gambar as $gambarPath)
                  <div class="w-full flex-shrink-0">
                    <img
                      src="https://placehold.co/600x400/{{ $bgColor }}/{{ $textColor }}?text={{ urlencode($prestasi->judul) }}&font=bold&fontsize=50"
                      alt="{{ $prestasi->judul }}" class="w-full h-full object-cover" />
                  </div>
                @endforeach
              @else
                <div class="w-full flex-shrink-0">
                  <img
                    src="https://placehold.co/600x400/{{ $bgColor }}/{{ $textColor }}?text={{ urlencode($prestasi->judul) }}&font=bold&fontsize=50" " alt="Gambar Tidak Tersedia"
                        class="w-full h-full object-cover" />
                    </div>
   @endif
                </div>

                {{-- Tombol Prev/Next carousel hanya muncul jika ada lebih dari 1 gambar --}}
                @if ($prestasi->gambar && is_array($prestasi->gambar) && count($prestasi->gambar) > 1)
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
                @endif
            </div>
            <div class="p-6">
              <h4 class="text-xl font-semibold text-gray-800 mb-3">
                {{ $prestasi->judul }}
              </h4>
              <p class="text-gray-600 text-sm mb-2">
                Pencapai: {{ $prestasi->pencapai }}
              </p>
              <p class="text-gray-600 text-sm mb-4">
                Periode: {{ $prestasi->periode }}
              </p>
              <p class="text-gray-700 leading-relaxed">
                {{ $prestasi->deskripsi_singkat }}
              </p>

            </div>
          </div>
        @empty
          <p class="col-span-full text-center py-8 text-lg text-gray-600">Belum ada prestasi yang tercatat untuk tahun
            {{ $year }}.</p>
      @endforelse

    </div>
  </section>
@endsection
