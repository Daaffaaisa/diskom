<!-- Header Section -->
<header class="bg-[#8B3A75] text-white p-4 shadow-lg">
  <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">

    <!-- Logo dan Nama -->
    <div class="flex items-center mb-4 md:mb-0">
      <img src="{{ asset('assets/header/logo.png') }}" class="h-16 w-16 mr-3 rounded-full shadow-md"
        alt="Logo SMP Negeri 44 Semarang" />
      <h1 class="text-3xl font-bold">SMP NEGERI 44 SEMARANG</h1>
    </div>

    <!-- Kontak, Sosmed, dan Login/Profile -->
    <div class="flex flex-col md:flex-row items-center space-y-3 md:space-y-0 md:gap-x-6 text-sm relative">
      <div class="flex items-center space-x-2">
        <i class="fas fa-envelope"></i>
        <span>smp44semarang@gmail.com</span>
      </div>
      <div class="flex items-center gap-x-5">
        <a href="#" target="_blank" class="hover:text-blue-300"><i class="fab fa-facebook-f text-xl"></i></a>
        <a href="#" target="_blank" class="hover:text-blue-300"><i class="fab fa-twitter text-xl"></i></a>
        <a href="#" target="_blank" class="hover:text-blue-300"><i class="fab fa-youtube text-xl"></i></a>
      </div>

      @auth
        <!-- Logout -->
        <a href="#" id="logoutLink"
          class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-5 rounded-full shadow-md transition-all">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>

        <!-- Dropdown Profil -->
        <div class="relative">
          <div onclick="toggleDropdown('profileDropdown')"
            class="inline-flex items-center bg-white text-[#8B3A75] px-4 py-2 rounded-full shadow cursor-pointer">
            <img src="{{ asset('assets/header/user.png') }}" class="w-16 h-8 rounded-full" alt="User Icon">
            {{ Auth::user()->name }}
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
          </div>
          <!-- Dropdown Menu -->
          <div id="profileDropdown"
            class="absolute top-full right-0 w-48 bg-white text-black rounded-lg shadow-xl hidden z-60 pt-3">
            @if (Auth::user()->role === 'admin')
              <a href="{{ route('dashboard.admin.admin') }}"
                class="block px-4 py-3 w-full hover:bg-gray-100 text-sm">Dashboard
                Admin</a>
            @else
              <a href="{{ route('dashboard.user.siswa') }}"
                class="block px-4 py-3 w-full hover:bg-gray-100 text-sm">Dashboard
                Siswa</a>
              <a href="/dashboard/kalender" class="block px-4 py-3 w-full hover:bg-gray-100 text-sm">Kalender Akademik</a>
              <a href="#" class="block px-4 py-3 w-full hover:bg-gray-100 text-sm">Pembayaran</a>
              <a href="#" id="keluhKesahButton" role="button"
                class="block px-4 py-3 w-full hover:bg-gray-100 text-sm">
                Keluh Kesah
              </a>
            @endif
          </div>
        </div>
      @else
        <!-- Login Button -->
        <button id="loginButton"
          class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-5 rounded-full shadow-md transition-all">
          Login
        </button>
      @endauth
    </div>
  </div>
</header>

<!-- MODAL LOGIN (Gradasi Ungu + Inter Font + Animasi) -->
<div id="loginModal"
  class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden transition-opacity duration-300 animate-fade-in">
  <div
    class="login-container relative p-8 rounded-lg shadow-2xl w-full max-w-md text-white border border-purple-400 animate-slide-up"
    style="background: linear-gradient(135deg, #8b3a75 0%, #6f2c5c 100%); font-family: 'Inter', sans-serif;">

    <button id="closeLoginModal"
      class="absolute top-4 right-6 text-white text-2xl font-bold hover:text-yellow-300">&times;</button>

    <div class="flex items-center justify-center mb-6">
      <img src="https://placehold.co/60x60/3498db/ffffff?text=LOGO" alt="Logo SMPN 44"
        class="h-16 w-16 mr-3 rounded-full shadow-md" />
      <h2 class="text-3xl font-bold">Login Pengguna</h2>
    </div>

    <p class="text-center text-lg mb-8 text-purple-100">
      Silakan masukkan username dan password Anda.
    </p>

    <form id="loginForm" class="space-y-6">
      @csrf
      <div>
        <label for="modal-username" class="block text-purple-100 text-sm font-bold mb-2">Username:</label>
        <input type="text" id="modal-username" name="email"
          class="bg-white shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500 transition-colors duration-200"
          placeholder="Masukkan username Anda" required />
      </div>
      <div>
        <label for="modal-password" class="block text-purple-100 text-sm font-bold mb-2">Password:</label>
        <input type="password" id="modal-password" name="password"
          class="bg-white hadow appearance-none border rounded w-full py-3 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500 transition-colors duration-200"
          placeholder="Masukkan password Anda" required />
      </div>
      <div class="flex items-center justify-between">
        <button type="submit"
          class="bg-yellow-400 hover:bg-yellow-500 text-purple-900 font-bold py-3 px-6 rounded-full focus:outline-none focus:shadow-outline transition-all duration-300 transform hover:scale-105 w-full text-lg">
          <i class="fas fa-sign-in-alt mr-2"></i> Login
        </button>
      </div>
    </form>

    <p class="text-center text-sm mt-8 text-purple-200">
      Belum punya akun? Hubungi pihak sekolah atau admin.
    </p>
  </div>
</div>

<!-- Custom Confirmation Modal (for Logout and others) -->
<div id="customConfirmModal"
  class="fixed inset-0 bg-black bg-opacity-50 z-[9999] flex items-center justify-center hidden">
  <div
    class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-sm text-center transform scale-95 transition-transform duration-300"
    style="font-family: 'Inter', sans-serif;">
    <p id="confirmMessage" class="text-lg font-semibold mb-6 text-gray-800"></p>
    <div class="flex justify-center space-x-4">
      <button id="confirmYes"
        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition-all">Ya</button>
      <button id="confirmNo"
        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-5 rounded-full transition-all">Tidak</button>
    </div>
  </div>
</div>

<!-- Modal Keluh Kesah -->
<div id="keluhKesahModal"
  class="fixed inset-0 bg-black bg-opacity-50 z-[9998] flex items-center justify-center hidden transition-opacity duration-300 animate-fade-in">
  <div class="relative p-8 rounded-lg shadow-2xl w-full max-w-lg text-white border border-purple-400 animate-slide-up"
    style="background: linear-gradient(135deg, #8b3a75 0%, #6f2c5c 100%); font-family: 'Inter', sans-serif;">

    <button id="closeKeluhKesahModal"
      class="absolute top-4 right-6 text-white text-2xl font-bold hover:text-yellow-300">&times;</button>

    <div class="flex items-center justify-center mb-6">
      <i class="fas fa-comment-alt text-4xl mr-3 text-yellow-300"></i>
      <h2 class="text-3xl font-bold">Keluh Kesah & Saran</h2>
    </div>

    <p class="text-center text-lg mb-8 text-purple-100">
      Sampaikan keluh kesah atau saran Anda untuk kemajuan sekolah.
    </p>

    <form id="keluhKesahForm" method="POST" class="space-y-6">
      <div>
        <label for="keluhKesahName" class="block text-purple-100 text-sm font-bold mb-2">Nama (Opsional):</label>
        <input type="text" id="keluhKesahName" name="name"
          class="bg-white shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500 transition-colors duration-200"
          placeholder="Nama Anda (misal: Orang Tua Murid / Anonim)" />
      </div>
      <div>
        <label for="keluhKesahEmail" class="block text-purple-100 text-sm font-bold mb-2">Email (Opsional):</label>
        <input type="email" id="keluhKesahEmail" name="email"
          class="bg-white shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500 transition-colors duration-200"
          placeholder="Email Anda" />
      </div>
      <div>
        <label for="keluhKesahMessage" class="block text-purple-100 text-sm font-bold mb-2">Pesan:</label>
        <textarea id="keluhKesahMessage" name="message" rows="5"
          class="bg-white shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-purple-500 transition-colors duration-200"
          placeholder="Tulis keluh kesah atau saran Anda di sini..." required></textarea>
      </div>
      <div>
        <button type="submit"
          class="bg-yellow-400 hover:bg-yellow-500 text-purple-900 font-bold py-3 px-6 rounded-full w-full transition-all duration-300 transform hover:scale-105">
          <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
        </button>
      </div>
    </form>
  </div>
</div>

<div id="keluhAlert"
  class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-[9999] hidden transition-opacity duration-300">
  <div
    class="bg-green-500 text-white px-8 py-6 rounded-lg shadow-xl text-center text-lg font-semibold animate-bounce-in">
    <span id="keluhAlertText">Pesan berhasil dikirim!</span>
  </div>
</div>
