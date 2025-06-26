@extends('layouts.app')
@section('content')
  <section>
    <h3 class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
      Kegiatan Ekstrakulikuler
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!--Silat-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/silat/1.jpeg') }}" alt="Pencak Silat 1"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/silat/2.jpeg') }}" alt="Pencak Silat 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/silat/3.jpeg') }}" alt="Pencak Silat 3"
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
          <h4 class="text-xl font-semibold text-gray-800 mb-3">Pencak Silat</h4>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Membentuk karakter disiplin, kemandirian, dan kepemimpinan melalui latihan bela diri
          </p>
        </div>
      </div>

      <!--Paskib-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/paskib/1.jpeg') }}" alt="Paskibra 1"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/paskib/2.jpeg') }}" alt="Paskibra 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/paskib/3.jpeg') }}" alt="Paskibra 3"
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
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Paskibra
          </h4>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Melatih kedisiplinan, kekompakan, dan rasa cinta tanah air melalui baris-berbaris.
          </p>
        </div>
      </div>

      <!--Musik-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/musik/1.jpeg') }}" alt="Musik 1"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/musik/2.jpeg') }}" alt="Musik 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/musik/3.jpeg') }}" alt="Musik 3"
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
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Musik
          </h4>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Mengembangkan bakat musikal siswa dalam berbagai alat musik dan vokal.
          </p>
        </div>
      </div>

      <!--Pramuka-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/pramuka/1.jpeg') }}" alt="Pramuka 1"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/pramuka/2.jpeg') }}" alt="Pramuka 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/pramuka/3.jpeg') }}" alt="Pramuka 3"
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
          <h4 class="text-xl font-semibold text-gray-800 mb-3">Pramuka</h4>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Mengembangkan karakter disiplin, kemandirian, dan kepemimpinan melalui kegiatan kepanduan..
          </p>
        </div>
      </div>

      <!--Bola-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/bola/1.jpeg') }}" alt="Sepak Bola 1"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/bola/2.jpeg') }}" alt="Sepak Bola 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/bola/3.jpeg') }}" alt="Sepak Bola 3"
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
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Sepak Bola
          </h4>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Menyalurkan minat dan bakat siswa dalam olahraga sepak bola serta melatih kerja sama tim.
          </p>
        </div>
      </div>

      <!--Tari-->
      <div
        class="group bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
        <div class="relative w-full h-48 overflow-hidden">
          <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/tari/1.jpeg') }}" alt="Seni Tari 1"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/tari/2.jpeg') }}" alt="Seni Tari 2"
                class="w-full h-full object-cover" />
            </div>
            <div class="w-full flex-shrink-0">
              <img src="{{ asset('assets/akademik/ekstrakulikuler/tari/3.jpeg') }}" alt="Seni Tari 3"
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
          <h4 class="text-xl font-semibold text-gray-800 mb-3">
            Seni Tari
          </h4>
          <p class="text-gray-700 leading-relaxed line-clamp-3">
            Menyalurkan minat dan bakat siswa dalam seni tari tradisional
            maupun modern.
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
