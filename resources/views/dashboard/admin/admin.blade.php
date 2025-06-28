@extends('layouts.app')

@section('content')
  <div class="flex flex-1">
    <aside class="w-64 bg-[#6F2C5C] text-white p-6 shadow-xl">
      <nav class="space-y-4">
        <a href="#"
          class="block py-3 px-4 rounded-md hover:bg-[#B7669A] transition-colors duration-200 sidebar-link active-admin-tab"
          data-target="manage-berita">
          <i class="fas fa-newspaper mr-3"></i>Manajemen Berita
        </a>
        <a href="#" class="block py-3 px-4 rounded-md hover:bg-[#B7669A] transition-colors duration-200 sidebar-link"
          data-target="manage-prestasi">
          <i class="fas fa-trophy mr-3"></i>Manajemen Prestasi
        </a>
        <a href="#"
          class="block py-3 px-4 rounded-md hover:bg-[#B7669A] transition-colors duration-200 sidebar-link"
          data-target="manage-ekstrakurikuler">
          <i class="fas fa-running mr-3"></i>Manajemen Ekstrakurikuler
        </a>
        <a href="#"
          class="block py-3 px-4 rounded-md hover:bg-[#B7669A] transition-colors duration-200 sidebar-link"
          data-target="manage-user">
          <i class="fas fa-users-cog mr-3"></i>Manajemen User
        </a>
      </nav>
    </aside>

    <div class="flex-grow p-8 bg-white rounded-tl-lg shadow-inner">
      <section id="manage-berita"
        class="admin-content-section active bg-purple-50 p-6 rounded-lg shadow-md border border-purple-200">
        <h2 class="text-3xl font-extrabold text-[#B7669A] mb-6 border-b-4 border-[#6F2C5C] pb-2">
          Manajemen Berita
        </h2>

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
          <h3 class="text-2xl font-bold text-gray-800 mb-4">
            Tambah/Edit Berita
          </h3>
          <form id="beritaForm" class="space-y-4">
            <input type="hidden" id="beritaId" />
            <div>
              <label for="beritaTitle" class="block text-gray-700 text-sm font-bold mb-2">Judul Berita:</label>
              <input type="text" id="beritaTitle"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan judul berita" required />
            </div>
            <div>
              <label for="beritaDate" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
              <input type="date" id="beritaDate"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required />
            </div>
            <div>
              <label for="beritaContent" class="block text-gray-700 text-sm font-bold mb-2">Isi Berita:</label>
              <textarea id="beritaContent" rows="5"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Tulis isi berita di sini..." required></textarea>
            </div>
            {{-- INI ADALAH BAGIAN YANG DIUBAH UNTUK UPLOAD GAMBAR --}}
            <div>
              <label for="beritaImageFiles" class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar (Pilih
                Banyak):</label>
              <input type="file" id="beritaImageFiles" name="gambar[]" {{-- Penting: nama 'gambar[]' dan 'multiple' --}}
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                multiple {{-- Untuk memungkinkan upload banyak file --}} accept="image/*" {{-- Hanya izinkan file gambar --}} />
              {{-- Tempat untuk menampilkan preview gambar yang diupload atau gambar yang sudah ada --}}
              <div id="beritaImagePreview" class="mt-2 grid grid-cols-2 gap-2"></div>
            </div>
            {{-- AKHIR DARI BAGIAN YANG DIUBAH --}}
            <div class="flex justify-end space-x-4">
              <button type="submit"
                class="bg-[#6F2C5C] hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-save mr-2"></i>Simpan Berita
              </button>
              <button type="button" id="cancelEditBerita"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                style="display: none;">
                <i class="fas fa-times mr-2"></i>Batal
              </button>
            </div>
          </form>
        </div>

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
            </tbody>
          </table>
        </div>
      </section>

      {{-- Manajemen Prestasi Section --}}
      <section id="manage-prestasi"
        class="admin-content-section bg-purple-50 p-6 rounded-lg shadow-md border border-purple-200 hidden">
        <h2 class="text-3xl font-extrabold text-[#B7669A] mb-6 border-b-4 border-[#6F2C5C] pb-2">
          Manajemen Prestasi
        </h2>

        {{-- Form Tambah/Edit Prestasi --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
          <h3 class="text-2xl font-bold text-gray-800 mb-4">
            Tambah/Edit Prestasi
          </h3>
          <form id="prestasiForm" class="space-y-4">
            <input type="hidden" id="prestasiId" />
            <div>
              <label for="prestasiTitle" class="block text-gray-700 text-sm font-bold mb-2">Judul Prestasi:</label>
              <input type="text" id="prestasiTitle"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan judul prestasi" required />
            </div>
            <div>
              <label for="prestasiAchiever" class="block text-gray-700 text-sm font-bold mb-2">Pencapai:</label>
              <input type="text" id="prestasiAchiever"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Contoh: Siti Aisyah (Kelas IX A)" required />
            </div>
            <div>
              <label for="prestasiPeriode"
                class="block text-gray-700 text-sm font-bold mb-2">Tanggal/Bulan/Periode:</label>
              <input type="text" id="prestasiPeriode"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Contoh: Mei 2024 atau Semester Ganjil 2023/2024" required />
            </div>
            <div>
              <label for="prestasiTahun" class="block text-gray-700 text-sm font-bold mb-2">Tahun Prestasi:</label>
              <input type="number" id="prestasiTahun"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Contoh: 2024" min="1900" max="{{ date('Y') + 5 }}" required />
            </div>
            <div>
              <label for="prestasiDescription" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi
                Singkat:</label>
              <textarea id="prestasiDescription" rows="3"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Deskripsi singkat prestasi..." required></textarea>
            </div>
            {{-- Bagian Upload Gambar untuk Prestasi --}}
            <div>
              <label for="prestasiImageFiles" class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar (Pilih
                Banyak):</label>
              <input type="file" id="prestasiImageFiles" name="gambar_baru[]"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                multiple accept="image/*" />
              <div id="prestasiImagePreview" class="mt-2 grid grid-cols-2 gap-2"></div>
            </div>
            {{-- Akhir Bagian Upload Gambar --}}
            <div class="flex justify-end space-x-4">
              <button type="submit"
                class="bg-[#6F2C5C] hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-save mr-2"></i>Simpan Prestasi
              </button>
              <button type="button" id="cancelEditPrestasi"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                style="display: none;">
                <i class="fas fa-times mr-2"></i>Batal
              </button>
            </div>
          </form>
        </div>

        {{-- Tabel Daftar Prestasi --}}
        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
          <h3 class="text-2xl font-bold text-gray-800 mb-4">Daftar Prestasi</h3>
          <table class="min-w-full bg-white border border-gray-200">
            <thead>
              <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Judul</th>
                <th class="py-3 px-6 text-left">Pencapai</th>
                <th class="py-3 px-6 text-left">Periode</th>
                <th class="py-3 px-6 text-left">Aksi</th>
              </tr>
            </thead>
            <tbody id="prestasiList" class="text-gray-700 text-sm">
              {{-- Data prestasi akan dimuat di sini oleh JavaScript --}}
            </tbody>
          </table>
        </div>
      </section>

      {{-- Manajemen Ekstrakurikuler Section --}}
      <section id="manage-ekstrakurikuler"
        class="admin-content-section bg-purple-50 p-6 rounded-lg shadow-md border border-purple-200 hidden">
        <h2 class="text-3xl font-extrabold text-[#B7669A] mb-6 border-b-4 border-[#6F2C5C] pb-2">
          Manajemen Ekstrakurikuler
        </h2>

        {{-- Form Tambah/Edit Ekstrakurikuler --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
          <h3 class="text-2xl font-bold text-gray-800 mb-4">
            Tambah/Edit Ekstrakurikuler
          </h3>
          <form id="ekskulForm" class="space-y-4">
            <input type="hidden" id="ekskulId" />
            <div>
              <label for="ekskulName" class="block text-gray-700 text-sm font-bold mb-2">Nama Ekstrakurikuler:</label>
              <input type="text" id="ekskulName"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan nama ekstrakurikuler" required />
            </div>
            <div>
              <label for="ekskulDescription" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
              <textarea id="ekskulDescription" rows="3"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Tulis deskripsi singkat ekstrakurikuler..." required></textarea>
            </div>
            {{-- Bagian Upload Gambar untuk Ekstrakurikuler --}}
            <div>
              <label for="ekskulImageFiles" class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar (Pilih
                Banyak):</label>
              <input type="file" id="ekskulImageFiles" name="gambar_baru[]" {{-- Penting: nama 'gambar_baru[]' dan 'multiple' --}}
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                multiple {{-- Untuk memungkinkan upload banyak file --}} accept="image/*" {{-- Hanya izinkan file gambar --}} />
              <div id="ekskulImagePreview" class="mt-2 grid grid-cols-2 gap-2"></div>
            </div>
            {{-- Akhir Bagian Upload Gambar --}}
            <div class="flex justify-end space-x-4">
              <button type="submit"
                class="bg-[#6F2C5C] hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-save mr-2"></i>Simpan Ekstrakurikuler
              </button>
              <button type="button" id="cancelEditEkskul"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                style="display: none;">
                <i class="fas fa-times mr-2"></i>Batal
              </button>
            </div>
          </form>
        </div>

        {{-- Tabel Daftar Ekstrakurikuler --}}
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
              {{-- Data ekstrakurikuler akan dimuat di sini oleh JavaScript --}}
            </tbody>
          </table>
        </div>
      </section>

      {{-- Manajemen User Section --}}
      <section id="manage-user"
        class="admin-content-section bg-blue-50 p-6 rounded-lg shadow-md border border-blue-200 hidden">
        <h2 class="text-3xl font-extrabold text-blue-800 mb-6 border-b-4 border-blue-500 pb-2">
          Manajemen User
        </h2>

        {{-- Form Tambah/Edit User --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
          <h3 class="text-2xl font-bold text-gray-800 mb-4">
            Tambah/Edit User
          </h3>
          <form id="userForm" class="space-y-4">
            <input type="hidden" id="userId" />
            <div>
              <label for="userName" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
              <input type="text" id="userName"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan nama user" required />
            </div>
            <div>
              <label for="userEmail" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
              <input type="email" id="userEmail"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan email user" required />
            </div>
            <div>
              <label for="userPassword" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
              <input type="password" id="userPassword"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Isi untuk password baru/ubah password" />
              <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah password.</p>
            </div>
            <div>
              <label for="userRole" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
              <select id="userRole"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="siswa">Siswa</option>
              </select>
            </div>
            <div class="flex justify-end space-x-4">
              <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-save mr-2"></i>Simpan User
              </button>
              <button type="button" id="cancelEditUser"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full transition-all duration-200 transform hover:scale-105"
                style="display: none;">
                <i class="fas fa-times mr-2"></i>Batal
              </button>
            </div>
          </form>
        </div>

        {{-- Tabel Daftar User --}}
        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
          <h3 class="text-2xl font-bold text-gray-800 mb-4">Daftar User</h3>
          <table class="min-w-full bg-white border border-gray-200">
            <thead>
              <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Nama</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Role</th>
                <th class="py-3 px-6 text-left">Aksi</th>
              </tr>
            </thead>
            <tbody id="userList" class="text-gray-700 text-sm">
              {{-- Data user akan dimuat di sini oleh JavaScript --}}
            </tbody>
          </table>
        </div>
      </section>
    @endsection
