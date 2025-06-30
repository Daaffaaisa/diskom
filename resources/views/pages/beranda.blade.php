@extends('layouts.app')
@section('content')
  <section id="beranda" class="tab-content active">
    <h2       class="text-4xl font-extrabold text-[#B7669A] mb-8 text-center border-b-4 border-[#6F2C5C] pb-3"    >
      Selamat Datang di SMPN 44 Semarang
      </h3>

      <div       class="relative w-full max-w-4xl mx-auto overflow-hidden rounded-lg shadow-lg h-96 group"    >
        <div         id="carouselTrack" class="flex transition-transform duration-700 ease-in-out w-full h-full"      >
          <div class="w-full flex-shrink-0">
            <img             src="{{ asset('assets/beranda/carouser1.jpeg') }}"             alt="Banner 1"
              class="w-full h-full object-cover"           />
          </div>
          <div class="w-full flex-shrink-0">
            <img             src="{{ asset('assets/beranda/carouser2.jpeg') }}"             alt="Banner 2"
              class="w-full h-full object-cover"           />
          </div>
          <div class="w-full flex-shrink-0">
            <img             src="{{ asset('assets/beranda/carouser3.jpeg') }}"             alt="Banner 3"
              class="w-full h-full object-cover"           />
          </div>
          <div class="w-full flex-shrink-0">
            <img             src="{{ asset('assets/beranda/carouser4.jpeg') }}"             alt="Banner 4"
              class="w-full h-full object-cover"           />
          </div>
          <div class="w-full flex-shrink-0">
            <img             src="{{ asset('assets/beranda/carouser5.jpeg') }}"             alt="Banner 5"
              class="w-full h-full object-cover"           />
          </div>
        </div>

        <button     id="prevBtn"
          class="absolute top-1/2 -translate-y-1/2 left-4 text-white text-4xl bg-black/30 rounded-full p-2 
         hover:bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
          &#10094;
        </button>

        <button   id="nextBtn"
          class="absolute top-1/2 -translate-y-1/2 right-4 text-white text-4xl bg-black/30 rounded-full p-2 
         hover:bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
          &#10095;
        </button>

      </div>
      <br>
      <div class="bg-purple-50 p-8 rounded-lg shadow-md mb-12 text-center">
        <h3         class="text-3xl font-bold text-[#B7669A] mb-6 border-b-2 border-[#6F2C5C] pb-2 inline-block">
          Sambutan Kepala Sekolah
        </h3>
        <img         src="{{ asset('assets/beranda/Foto kepsek.jpg') }}"         alt="Foto Kepala Sekolah"
          class="w-36 h-36 rounded-full mx-auto mb-6 border-4 border-purple-300 shadow-lg"       />
        <p class="text-gray-700 text-lg leading-relaxed italic text-justify">
          "Salam sejahtera untuk kita semua, Alhamdulillah puji syukur kami
          panjatkan kehadirat Allah Subhanahu Wa Ta’ala atas limpahan rahmat
          serta karunia-Nya sehingga dapat terwujudnya Website SMP Negeri 44
          Semarang dengan alamat smpn44.semarangkota.go.id. Website ini
          terwujud atas kerjasama pihak sekolah dengan Dinas Pendidikan dan
          Pemerintah Kota Semarang. Saya selaku Kepala Sekolah mengucapkan
          terima kasih kepada semua pihak yang telah membantu khususnya tim
          Website sekolah kami sehingga dapat memperkenalkan segala perihal
          yang dimiliki oleh sekolah melalui Website.
          <br />
          <br />
          Website ini tidak hanya menyajikan informasi dan pelayanan publik
          tetapi juga menampilkan berbagai informasi terkait dengan
          penyelenggaraan Pendidikan di SMP N 44 Semarang. Dengan harapan
          masyarakat umum dapat mencari atau mengakses segala informasi yang
          dibutuhkan. Website sekolah kami tentunya masih terdapat banyak
          kekurangan, oleh karena itu kepada seluruh warga sekolah dan
          masyarakat umum dapat memberikan kritik dan saran demi kemajuan
          Website ini lebih lanjut.
          <br />
          <br />
          Demikian sambutan ini disampaikan, kami berharap warga masyarakat
          untuk terus berperan aktif dalam mengawal pelaksanaan pengelolaan
          dan penyelenggaraan Pendidikan di SMP Negeri 44 Semarang. Akhir
          kata, kami ucapkan terima kasih dan penghargaan pada semua pihak
          yang telah berkontribusi dalam pengembangan website ini. Semoga
          Allah SWT selalu meridhoi niat baik kita."
        </p>
        <p class="mt-6 text-xl font-semibold text-[#B7669A]">
          - Y. Hesty Padmaratnawati, S.Pd. -
        </p>
      </div>

      <div class="mb-12">
        <h3         class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
          Fasilitas Sekolah
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div
            class="bg-white p-6 rounded-lg shadow-lg border border-[#E9C5DC] transform hover:scale-105 transition-transform duration-300">
            <i class="fas fa-book-open text-blue-500 text-5xl mb-4"></i>
            <h4 class="text-xl font-bold text-gray-800 mb-3">
              Perpustakaan Lengkap
            </h4>
            <p class="text-gray-600">
              Menyediakan beragam koleksi buku dan sumber belajar digital
              untuk mendukung proses pendidikan siswa.
            </p>
          </div>
          <div
            class="bg-white p-6 rounded-lg shadow-lg border border-[#E9C5DC] transform hover:scale-105 transition-transform duration-300">
            <i class="fas fa-laptop-code text-green-500 text-5xl mb-4"></i>
            <h4 class="text-xl font-bold text-gray-800 mb-3">
              Laboratorium Komputer
            </h4>
            <p class="text-gray-600">
              Dilengkapi dengan perangkat keras dan perangkat lunak terbaru
              untuk pembelajaran TIK.
            </p>
          </div>
          <div
            class="bg-white p-6 rounded-lg shadow-lg border border-[#E9C5DC] transform hover:scale-105 transition-transform duration-300">
            <i class="fas fa-futbol text-red-500 text-5xl mb-4"></i>
            <h4 class="text-xl font-bold text-gray-800 mb-3">
              Lapangan Olahraga
            </h4>
            <p class="text-gray-600">
              Fasilitas olahraga yang memadai untuk mengembangkan bakat siswa
              di berbagai cabang.
            </p>
          </div>
          <div
            class="bg-white p-6 rounded-lg shadow-lg border border-[#E9C5DC] transform hover:scale-105 transition-transform duration-300">
            <i class="fas fa-flask text-purple-500 text-5xl mb-4"></i>
            <h4 class="text-xl font-bold text-gray-800 mb-3">Ruang Kelas</h4>
            <p class="text-gray-600">
              Sarana praktik yang lengkap untuk kegiatan belajar mengajar.
            </p>
          </div>
          <div
            class="bg-white p-6 rounded-lg shadow-lg border border-[#E9C5DC] transform hover:scale-105 transition-transform duration-300">
            <i class="fas fa-medkit text-orange-500 text-5xl mb-4"></i>
            <h4 class="text-xl font-bold text-gray-800 mb-3">Ruang UKS</h4>
            <p class="text-gray-600">
              Unit Kesehatan Sekolah yang siap melayani kebutuhan medis
              darurat siswa.
            </p>
          </div>
          <div
            class="bg-white p-6 rounded-lg shadow-lg border border-[#E9C5DC] transform hover:scale-105 transition-transform duration-300">
            <i class="fas fa-microphone text-blue-500 text-5xl mb-4"></i>
            <h4 class="text-xl font-bold text-gray-800 mb-3">
              Aula Serbaguna
            </h4>
            <p class="text-gray-600">
              Digunakan untuk kegiatan pertemuan, seni, dan acara sekolah
              lainnya.
            </p>
          </div>
        </div>
      </div>

      <div>
        <h3         class="text-3xl font-bold text-[#B7669A] mb-8 text-center border-b-2 border-[#6F2C5C] pb-2">
          Berita Terbaru
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

          @forelse($latestNews as $berita)
            <div
              class="group relative bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 transform hover:scale-105 transition-transform duration-300">
              <div class="relative w-full h-48 overflow-hidden">
                <div class="carousel-track flex transition-transform duration-700 ease-in-out h-full">
                  @if ($berita->gambar && is_array($berita->gambar) && count($berita->gambar) > 0)
                    @foreach ($berita->gambar as $gambarPath)
                      <div class="w-full flex-shrink-0">
                        <img                         src="{{ asset($gambarPath) }}" alt="{{ $berita->judul }}"
                          class="w-full h-full object-cover" />
                      </div>
                    @endforeach
                  @else
                    <div class="w-full flex-shrink-0">
                      <img                       src="{{ asset('images/placeholder-berita.jpg') }}"
                        alt="Gambar Tidak Tersedia" class="w-full h-full object-cover"                     />
                    </div>
                  @endif
                </div>

                @if ($berita->gambar && is_array($berita->gambar) && count($berita->gambar) > 1)
                  <button
                    class="absolute top-1/2 left-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 prev-btn"
                    title="Sebelumnya"                >
                    &#10094;
                  </button>
                  <button
                    class="absolute top-1/2 right-2 -translate-y-1/2 bg-black/40 text-white p-1 rounded-full text-xl opacity-0 group-hover:opacity-100 transition-all duration-300 next-btn"
                    title="Berikutnya"                >
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
                <p class="text-gray-700 leading-relaxed">
                  {{ Str::limit($berita->konten, 450) }}
                </p>
              </div>
            </div>
          @empty
            <p class="col-span-full text-center py-8 text-lg text-gray-600">Belum ada berita terbaru.</p>
          @endforelse

        </div>
      </div>

      </div>
  </section>
@endsection
