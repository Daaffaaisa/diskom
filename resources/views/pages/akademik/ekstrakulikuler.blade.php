@extends('layouts.app')
@section('content')
  <section>
    <h3 class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
      Kegiatan Ekstrakurikuler
      </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      {{-- Loop untuk menampilkan data ekstrakurikuler dari database --}}
      @forelse($ekstrakurikulers as $ekstrakurikuler)
        <div
          class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
          <div class="relative w-full h-48 overflow-hidden">
            <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
              @if ($ekstrakurikuler->gambar && is_array($ekstrakurikuler->gambar) && count($ekstrakurikuler->gambar) > 0)
                @foreach ($ekstrakurikuler->gambar as $gambarPath)
                  <div class="w-full flex-shrink-0">
                    <img src="{{ asset($gambarPath) }}" alt="{{ $ekstrakurikuler->nama }}"
                      class="w-full h-full object-cover" />
                    </div>
                @endforeach
              @else
                <div class="w-full flex-shrink-0">
                  {{-- Placeholder jika tidak ada gambar --}}
                  <img src="{{ asset('images/placeholder-ekstrakurikuler.jpg') }}"
                    alt="Gambar Tidak Tersedia"                   class="w-full h-full object-cover" />
                  </div>
              @endif
              </div>
            
            {{-- Tombol Prev/Next carousel hanya muncul jika ada lebih dari 1 gambar --}}
            @if ($ekstrakurikuler->gambar && is_array($ekstrakurikuler->gambar) && count($ekstrakurikuler->gambar) > 1)
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
            <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $ekstrakurikuler->nama }}</h4>
            <p class="text-gray-700 leading-relaxed line-clamp-3">
              {{ Str::limit($ekstrakurikuler->deskripsi, 150) }}
              </p>
            </div>
          </div>
      @empty
        <p class="col-span-full text-center py-8 text-lg text-gray-600">Belum ada kegiatan ekstrakurikuler yang
          tersedia.</p>
      @endforelse
      </div>
    </section>
@endsection
