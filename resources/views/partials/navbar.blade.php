<!-- Navigation Bar -->
<nav id="navbar" class="fixed bg-transparent p-7 sticky top-0 z-50 transition-all duration-300">
  <div class="container mx-auto">
    <ul class="flex flex-wrap justify-center gap-x-8  text-lg font-semibold">
      <li>
        <a href="/pages/beranda"
          class="ml-4 text-black hover:text-[#E9C5DC] py-2 px-3 rounded-md transition-colors duration-200 active-tab">Beranda</a>
      </li>
      <li>
        <a href="/pages/profile"
          class="text-black hover:text-[#E9C5DC] py-2 px-3 rounded-md transition-colors duration-200">Profile</a>
      </li>
      <li class="relative group">
        <div class="flex flex-col">
          <a href=""
            class="inline-flex hover:text-[#E9C5DC]  px-3 rounded-md transition-colors duration-200 flex items-center">
            Akademik
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
          </a>

          <!-- Wrapper agar hover tetap nyambung -->
          <div
            class="absolute top-full left-0 w-38 bg-[#8B3A75] text-blackrounded-lg shadow-xl opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 z-50 pt-2">
            <a href="/pages/akademik/prestasi"
              class="block py-3 px-4 hover:text-[#E9C5DC] transition-colors duration-200 text-sm">
              Prestasi
            </a>
            <a href="/pages/akademik/ekstrakulikuler"
              class="block py-3 px-4 hover:text-[#E9C5DC] transition-colors duration-200 text-sm">
              Ekstrakurikuler
            </a>
          </div>
        </div>
      </li>

      <li>
        <a href="https://kubuku.id/download/sekolah/20331836/"
          class="text-black hover:text-[#E9C5DC] py-2 px-3 rounded-md transition-colors duration-200"
          target = "_blank">Perpustakaan</a>
      </li>
      <li>
        <a href="/pages/PPDB"
          class="nav-link text-black hover:text-[#E9C5DC] py-2 px-3 rounded-md transition-colors duration-200">PPDB</a>

      </li>
      <li>
        <a href="/pages/berita"
          class="nav-link text-black hover:text-[#E9C5DC] py-2 px-3 rounded-md transition-colors duration-200">Berita</a>
      </li>
    </ul>
  </div>
</nav>
