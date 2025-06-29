import { initNavbarScrollEffect } from './modules/navbar';
import { initMainCarousel, initCardCarousels } from './modules/carousel';
import { initLoginModal } from './modules/modalLogin';
import { initKeluhKesahModal } from './modules/keluhKesah';
import { showCustomAlert, showConfirmModal } from './modules/alertHandler';
import { initAjaxLogin, initLogoutHandler } from './modules/auth';
import { initAdminSectionNavigation } from './modules/admin/sectionManager';
import { initBeritaManager } from './modules/admin/beritaManager';
import { initPrestasiManager } from './modules/admin/prestasiManager';
import { initEkskulManager } from './modules/admin/ekskulManager';
import { initUserManager } from './modules/admin/userManager';

document.addEventListener("DOMContentLoaded", function () {
    // ========== Navbar ========== //
    initNavbarScrollEffect();

    // ========== Main Carousel (beranda) ========== //
    initMainCarousel();


    // ========== Carousel dalam Card (Berita di Halaman Public & Admin Dashboard) ========== //
    initCardCarousels();

    // ========== Modal Login ========== //
    initLoginModal();


    // --- JavaScript untuk Modal Keluh Kesah ---
    initKeluhKesahModal();

    // ========== AJAX Login ========== //
     initAjaxLogin();

    // Global Functions (karena dipanggil dari HTML atau perlu diakses dari mana saja)
    window.toggleDropdown = function (id) {
        const dropdown = document.getElementById(id);
        if (dropdown) {
            dropdown.classList.toggle('hidden');
        }
    };

    // ========== Logout Handler ========== //
    initLogoutHandler();

        // ========== Alert ========== //
    window.showCustomAlert = showCustomAlert;
    window.showConfirmModal = showConfirmModal;

    // ========== CRUD LOGIC ========= //
    const loadBeritas = initBeritaManager();
    const loadPrestasi = initPrestasiManager();
    const loadEkskuls = initEkskulManager();
    const loadUsers = initUserManager();

    initAdminSectionNavigation({
        'manage-berita': loadBeritas,
        'manage-prestasi': loadPrestasi,
        'manage-ekstrakurikuler': loadEkskuls,
        'manage-user': loadUsers
    });
}); // Tutup DOMContentLoaded