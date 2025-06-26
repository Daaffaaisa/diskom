@extends('layouts.app')

@section('content')
<!-- Main Content Area - Admin Dashboard -->
    <div class="flex flex-1">
      <!-- Sidebar Navigasi -->
      <aside class="w-64 bg-[#6F2C5C] text-white p-6 shadow-xl">
        <nav class="space-y-4">
          <a
            href="#"
            class="block py-3 px-4 rounded-md hover:bg-[#B7669A] transition-colors duration-200 sidebar-link active-admin-tab"
            data-target="manage-berita"
          >
            <i class="fas fa-newspaper mr-3"></i>Manajemen Berita
          </a>
          <a
            href="#"
            class="block py-3 px-4 rounded-md hover:bg-[#B7669A] transition-colors duration-200 sidebar-link"
            data-target="manage-prestasi"
          >
            <i class="fas fa-trophy mr-3"></i>Manajemen Prestasi
          </a>
          <a
            href="#"
            class="block py-3 px-4 rounded-md hover:bg-[#B7669A] transition-colors duration-200 sidebar-link"
            data-target="manage-ekstrakurikuler"
          >
            <i class="fas fa-running mr-3"></i>Manajemen Ekstrakurikuler
          </a>
          <!-- Bisa tambahkan link lain untuk manajemen pengguna, fasilitas, dll. -->
        </nav>
      </aside>

      <!-- Konten Utama Dashboard -->
      <main class="flex-grow p-8 bg-white rounded-tl-lg shadow-inner">
        <!-- Manajemen Berita Section -->
        <section
          id="manage-berita"
          class="admin-content-section active bg-blue-50 p-6 rounded-lg shadow-md border border-blue-200"
        >
          <h2
            class="text-3xl font-extrabold text-blue-800 mb-6 border-b-4 border-blue-500 pb-2"
          >
            Manajemen Berita
          </h2>

          <!-- Form Tambah/Edit Berita -->
          <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">
              Tambah/Edit Berita
            </h3>
            <form id="beritaForm" class="space-y-4">
              <input type="hidden" id="beritaId" />
              <div>
                <label
                  for="beritaTitle"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Judul Berita:</label
                >
                <input
                  type="text"
                  id="beritaTitle"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Masukkan judul berita"
                  required
                />
              </div>
              <div>
                <label
                  for="beritaDate"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Tanggal:</label
                >
                <input
                  type="date"
                  id="beritaDate"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  required
                />
              </div>
              <div>
                <label
                  for="beritaContent"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Isi Berita:</label
                >
                <textarea
                  id="beritaContent"
                  rows="5"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Tulis isi berita di sini..."
                  required
                ></textarea>
              </div>
              <div>
                <label
                  for="beritaImageUrl"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >URL Gambar (Opsional):</label
                >
                <input
                  type="url"
                  id="beritaImageUrl"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Contoh: https://placehold.co/400x250"
                />
              </div>
              <div class="flex justify-end space-x-4">
                <button
                  type="submit"
                  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                >
                  <i class="fas fa-save mr-2"></i>Simpan Berita
                </button>
                <button
                  type="button"
                  id="cancelEditBerita"
                  class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                  style="display: none;"
                >
                  <i class="fas fa-times mr-2"></i>Batal
                </button>
              </div>
            </form>
          </div>

          <!-- Tabel Daftar Berita -->
          <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Daftar Berita</h3>
            <table class="min-w-full bg-white border border-gray-200">
              <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                  <th class="py-3 px-6 text-left">Judul</th>
                  <th class="py-3 px-6 text-left">Tanggal</th>
                  <th class="py-3 px-6 text-left">Aksi</th>
                </tr>
              </thead>
              <tbody id="beritaList" class="text-gray-700 text-sm">
                <!-- Data berita akan dimuat di sini oleh JavaScript -->
              </tbody>
            </table>
          </div>
        </section>

        <!-- Manajemen Prestasi Section -->
        <section
          id="manage-prestasi"
          class="admin-content-section bg-blue-50 p-6 rounded-lg shadow-md border border-blue-200"
        >
          <h2
            class="text-3xl font-extrabold text-blue-800 mb-6 border-b-4 border-blue-500 pb-2"
          >
            Manajemen Prestasi
          </h2>

          <!-- Form Tambah/Edit Prestasi -->
          <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">
              Tambah/Edit Prestasi
            </h3>
            <form id="prestasiForm" class="space-y-4">
              <input type="hidden" id="prestasiId" />
              <div>
                <label
                  for="prestasiTitle"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Judul Prestasi:</label
                >
                <input
                  type="text"
                  id="prestasiTitle"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Masukkan judul prestasi"
                  required
                />
              </div>
              <div>
                <label
                  for="prestasiAchiever"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Pencapai:</label
                >
                <input
                  type="text"
                  id="prestasiAchiever"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Contoh: Siti Aisyah (Kelas IX A)"
                  required
                />
              </div>
              <div>
                <label
                  for="prestasiDate"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Tanggal/Bulan:</label
                >
                <input
                  type="text"
                  id="prestasiDate"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Contoh: Mei 2024"
                  required
                />
              </div>
              <div>
                <label
                  for="prestasiDescription"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Deskripsi Singkat:</label
                >
                <textarea
                  id="prestasiDescription"
                  rows="3"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Deskripsi singkat prestasi..."
                  required
                ></textarea>
              </div>
              <div>
                <label
                  for="prestasiImageUrl"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >URL Gambar (Opsional):</label
                >
                <input
                  type="url"
                  id="prestasiImageUrl"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Contoh: https://placehold.co/400x250"
                />
              </div>
              <div class="flex justify-end space-x-4">
                <button
                  type="submit"
                  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                >
                  <i class="fas fa-save mr-2"></i>Simpan Prestasi
                </button>
                <button
                  type="button"
                  id="cancelEditPrestasi"
                  class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                  style="display: none;"
                >
                  <i class="fas fa-times mr-2"></i>Batal
                </button>
              </div>
            </form>
          </div>

          <!-- Tabel Daftar Prestasi -->
          <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Daftar Prestasi</h3>
            <table class="min-w-full bg-white border border-gray-200">
              <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                  <th class="py-3 px-6 text-left">Judul</th>
                  <th class="py-3 px-6 text-left">Pencapai</th>
                  <th class="py-3 px-6 text-left">Aksi</th>
                </tr>
              </thead>
              <tbody id="prestasiList" class="text-gray-700 text-sm">
                <!-- Data prestasi akan dimuat di sini oleh JavaScript -->
              </tbody>
            </table>
          </div>
        </section>

        <!-- Manajemen Ekstrakurikuler Section -->
        <section
          id="manage-ekstrakurikuler"
          class="admin-content-section bg-blue-50 p-6 rounded-lg shadow-md border border-blue-200"
        >
          <h2
            class="text-3xl font-extrabold text-blue-800 mb-6 border-b-4 border-blue-500 pb-2"
          >
            Manajemen Ekstrakurikuler
          </h2>

          <!-- Form Tambah/Edit Ekstrakurikuler -->
          <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">
              Tambah/Edit Ekstrakurikuler
            </h3>
            <form id="ekskulForm" class="space-y-4">
              <input type="hidden" id="ekskulId" />
              <div>
                <label
                  for="ekskulName"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Nama Ekstrakurikuler:</label
                >
                <input
                  type="text"
                  id="ekskulName"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Masukkan nama ekstrakurikuler"
                  required
                />
              </div>
              <div>
                <label
                  for="ekskulDescription"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >Deskripsi:</label
                >
                <textarea
                  id="ekskulDescription"
                  rows="3"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Tulis deskripsi singkat ekstrakurikuler..."
                  required
                ></textarea>
              </div>
              <div>
                <label
                  for="ekskulImageUrl"
                  class="block text-gray-700 text-sm font-bold mb-2"
                  >URL Gambar (Opsional):</label
                >
                <input
                  type="url"
                  id="ekskulImageUrl"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Contoh: https://placehold.co/400x250"
                />
              </div>
              <div class="flex justify-end space-x-4">
                <button
                  type="submit"
                  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                >
                  <i class="fas fa-save mr-2"></i>Simpan Ekstrakurikuler
                </button>
                <button
                  type="button"
                  id="cancelEditEkskul"
                  class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                  style="display: none;"
                >
                  <i class="fas fa-times mr-2"></i>Batal
                </button>
              </div>
            </form>
          </div>

          <!-- Tabel Daftar Ekstrakurikuler -->
          <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Daftar Ekstrakurikuler</h3>
            <table class="min-w-full bg-white border border-gray-200">
              <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                  <th class="py-3 px-6 text-left">Nama</th>
                  <th class="py-3 px-6 text-left">Deskripsi</th>
                  <th class="py-3 px-6 text-left">Aksi</th>
                </tr>
              </thead>
              <tbody id="ekskulList" class="text-gray-700 text-sm">
                <!-- Data ekstrakurikuler akan dimuat di sini oleh JavaScript -->
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
@endsection
