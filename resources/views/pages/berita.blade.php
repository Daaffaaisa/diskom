@extends('layouts.app')

@section('content')
  <section class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-extrabold text-[#B7669A] mb-8 text-center border-b-4 border-[#6F2C5C] pb-3">
      Berita dan Kegiatan Sekolah
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      {{-- Loop untuk menampilkan berita dari database --}}
      @forelse($beritas as $berita)
        <div
          class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
          <div class="relative w-full h-48 overflow-hidden">
            {{-- Ini adalah TRACK carousel untuk gambar --}}
            <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
              @if ($berita->gambar && is_array($berita->gambar) && count($berita->gambar) > 0)
                @foreach ($berita->gambar as $gambarPath)
                  {{-- Setiap gambar adalah item terpisah dalam carousel --}}
                  <div class="w-full flex-shrink-0">
                    {{-- Pastikan path gambar sesuai dengan yang disimpan di DB --}}
                    {{-- Jika di DB tersimpan 'assets/berita_images/nama_file.jpg' --}}
                    <img src="{{ asset($gambarPath) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover" />
                  </div>
                @endforeach
              @else
                {{-- Placeholder jika tidak ada gambar --}}
                <div class="w-full flex-shrink-0">
                  <img src="{{ asset('images/placeholder-berita.jpg') }}" alt="Gambar Tidak Tersedia"
                    class="w-full h-full object-cover" />
                </div>
              @endif
            </div>

            {{-- Tombol Prev/Next carousel hanya muncul jika ada lebih dari 1 gambar --}}
            @if ($berita->gambar && is_array($berita->gambar) && count($berita->gambar) > 1)
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
              {{ $berita->judul }}
            </h4>
            <p class="text-gray-600 text-sm mb-4">
              {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y') }}</p>
            <p class="text-gray-700 leading-relaxed line-clamp-3">
              {{ Str::limit($berita->konten, 150) }}
            </p>
            {{-- Link ke detail berita (jika nanti ada) --}}
            {{-- <a href="{{ route('berita.show', $berita->id) }}" class="text-[#8B3A75] hover:underline mt-2 inline-block">Baca Selengkapnya</a> --}}
          </div>
        </div>
      @empty
        <p class="col-span-full text-center py-8 text-lg text-gray-600">Belum ada berita yang tersedia.</p>
      @endforelse

    </div>
  </section>
@endsection
