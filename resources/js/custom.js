document.addEventListener("DOMContentLoaded", function () {
    // ========== Navbar ========== //
    const navbar = document.getElementById("navbar");

    if (navbar) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.remove("bg-transparent");
                navbar.classList.add("bg-[#8B3A75]");
            } else {
                navbar.classList.remove("bg-[#8B3A75]");
                navbar.classList.add("bg-transparent");
            }
        });
    }

    // ========== Main Carousel (beranda) ========== //
    const trackUtama = document.getElementById("carouselTrack");
    const prevBtnUtama = document.getElementById("prevBtn");
    const nextBtnUtama = document.getElementById("nextBtn");

    if (trackUtama && prevBtnUtama && nextBtnUtama) {
        const totalItemsUtama = trackUtama.children.length;
        let currentIndexUtama = 0;

        function updateCarouselUtama(index) {
            trackUtama.style.transform = `translateX(-${index * 100}%)`;
        }

        setInterval(() => {
            currentIndexUtama = (currentIndexUtama + 1) % totalItemsUtama;
            updateCarouselUtama(currentIndexUtama);
        }, 5000);

        prevBtnUtama.addEventListener("click", () => {
            currentIndexUtama = (currentIndexUtama - 1 + totalItemsUtama) % totalItemsUtama;
            updateCarouselUtama(currentIndexUtama);
        });

        nextBtnUtama.addEventListener("click", () => {
            currentIndexUtama = (currentIndexUtama + 1) % totalItemsUtama;
            updateCarouselUtama(currentIndexUtama);
        });
    }

    // ========== Carousel dalam Card (Berita / Ekstrakurikuler) ========== //
    document.querySelectorAll(".group").forEach((card) => {
        const trackCard = card.querySelector(".carousel-track");
        const prevCardBtn = card.querySelector(".prev-btn");
        const nextCardBtn = card.querySelector(".next-btn");

        if (!trackCard || !prevCardBtn || !nextCardBtn) return;

        const images = trackCard.querySelectorAll("img");
        let indexCard = 0;
        const totalCardImages = images.length;

        if (totalCardImages <= 1) {
            prevCardBtn.style.display = 'none';
            nextCardBtn.style.display = 'none';
            return;
        }

        function updateCardCarousel() {
            trackCard.style.transform = `translateX(-${indexCard * 100}%)`;
        }

        setInterval(() => {
            indexCard = (indexCard + 1) % totalCardImages;
            updateCardCarousel();
        }, 4000);

        prevCardBtn.addEventListener("click", () => {
            indexCard = (indexCard - 1 + totalCardImages) % totalCardImages;
            updateCardCarousel();
        });

        nextCardBtn.addEventListener("click", () => {
            indexCard = (indexCard + 1) % totalCardImages;
            updateCardCarousel();
        });
    });

    // ========== Modal Login ========== //
    const loginButton = document.getElementById("loginButton");
    const loginModal = document.getElementById("loginModal");
    const closeLoginModal = document.getElementById("closeLoginModal");

    if (loginButton && loginModal && closeLoginModal) {
  loginButton.addEventListener("click", () => {
    loginModal.classList.remove("hidden");
  });

  closeLoginModal.addEventListener("click", () => {
    loginModal.classList.add("hidden");
  });

  loginModal.addEventListener("click", (e) => {
    if (e.target === loginModal) {
      loginModal.classList.add("hidden");
    }
  });
}

  // --- JavaScript untuk Modal Keluh Kesah ---
        const keluhKesahButton = document.getElementById("keluhKesahButton");
        const keluhKesahModal = document.getElementById("keluhKesahModal");
        const closeKeluhKesahModal = document.getElementById("closeKeluhKesahModal");
        const keluhKesahForm = document.getElementById("keluhKesahForm");

        if (keluhKesahButton && keluhKesahModal && closeKeluhKesahModal && keluhKesahForm) {
            keluhKesahButton.addEventListener("click", (e) => {
                e.preventDefault();
                keluhKesahModal.classList.remove("hidden");

            });

            closeKeluhKesahModal.addEventListener("click", () => {
                keluhKesahModal.classList.add("hidden");

            });

            keluhKesahModal.addEventListener("click", (e) => {
                if (e.target === keluhKesahModal) {
                    keluhKesahModal.classList.add("hidden");

                }
            });

keluhKesahForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const name = document.getElementById("keluhKesahName").value;
    const email = document.getElementById("keluhKesahEmail").value;
    const message = document.getElementById("keluhKesahMessage").value;

    fetch('/keluh-kesah', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.Laravel.csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ name, email, message })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
        keluhKesahForm.reset();
        showKeluhAlert("Terima kasih! Keluh kesah Anda telah kami terima.");
        } else {
            showKeluhAlert("Gagal mengirim pesan.");
        }
    })
    .catch(err => {
        console.error("Kesalahan saat submit:", err);
        showKeluhAlert("Terjadi kesalahan, coba lagi nanti.");
    });
});

        } else {
            console.warn("Elemen modal keluh kesah atau tombol terkait tidak ditemukan.");
        }

    // === NOTIF KELUH KESAH ===
function showKeluhAlert(message) {
  const alertBox = document.getElementById("keluhAlert");
  const alertText = document.getElementById("keluhAlertText");
  const keluhKesahModal = document.getElementById("keluhKesahModal");

  if (alertBox && alertText) {
    alertText.textContent = message;

    // ✅ Tutup modal: hilangkan "show", tambahkan "hidden"
    if (keluhKesahModal) {
      keluhKesahModal.classList.remove("show");
      keluhKesahModal.classList.add("hidden");
    }

    // ✅ Tampilkan alert-nya
    alertBox.classList.remove("hidden");
    alertBox.classList.add("opacity-100");

    // ✅ Sembunyikan alert setelah 2.5 detik
    setTimeout(() => {
      alertBox.classList.remove("opacity-100");
      alertBox.classList.add("hidden");
    }, 2500);
  }
}




    // ========== AJAX Login ========== //
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();
            let formData = new FormData(this);

            fetch(window.Laravel.loginUrl, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': window.Laravel.csrfToken
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    showCustomAlert(data.error || "Login gagal"); // Mengganti alert()
                }
            })
            .catch((error) => {
                console.error("Terjadi kesalahan saat login:", error);
                showCustomAlert("Terjadi kesalahan saat login."); // Mengganti alert()
            });
        });
    }

    // ========== Event listener untuk tombol logout ========== //
    const logoutLink = document.getElementById('logoutLink');
    if (logoutLink) {
        logoutLink.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default dari tag <a>
            confirmLogout();
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
  window.toggleDropdown = function (id) {
    const dropdown = document.getElementById(id);
    if (dropdown) {
      dropdown.classList.toggle('hidden');
    }
  };

  // Close dropdown on outside click
  window.addEventListener('click', function (e) {
    const dropdown = document.getElementById('profileDropdown');
    const button = dropdown?.previousElementSibling;

    if (dropdown && button && !dropdown.contains(e.target) && !button.contains(e.target)) {
      dropdown.classList.add('hidden');
    }
  });
});

// Custom Alert Modal
function showCustomAlert(message) {
    const alertModal = document.getElementById('customAlertModal');
    const alertMessage = document.getElementById('alertMessage');
    const closeAlertModal = document.getElementById('closeAlertModal');

    if (alertModal && alertMessage && closeAlertModal) {
        alertMessage.textContent = message;
        alertModal.classList.remove('hidden');

        closeAlertModal.onclick = () => {
            alertModal.classList.add('hidden');
        };

        alertModal.onclick = (e) => {
            if (e.target === alertModal) {
                alertModal.classList.add('hidden');
            }
        };
    }
}

// Custom Confirmation Modal
let confirmCallback = null;
function showConfirmModal(message, callback) {
    const confirmModal = document.getElementById('customConfirmModal');
    const confirmMessage = document.getElementById('confirmMessage');
    const confirmYes = document.getElementById('confirmYes');
    const confirmNo = document.getElementById('confirmNo');

    if (confirmModal && confirmMessage && confirmYes && confirmNo) {
        confirmMessage.textContent = message;
        confirmCallback = callback;
        confirmModal.classList.remove('hidden');

        confirmYes.onclick = () => {
            confirmModal.classList.add('hidden');
            if (confirmCallback) {
                confirmCallback(true);
            }
        };

        confirmNo.onclick = () => {
            confirmModal.classList.add('hidden');
            if (confirmCallback) {
                confirmCallback(false);
            }
        };

        confirmModal.onclick = (e) => {
            if (e.target === confirmModal) {
                confirmModal.classList.add('hidden');
                if (confirmCallback) {
                  confirmCallback(false);
                }
            }
        };
    }
}

// ========== Function Logout (di luar DOMContentLoaded biar global) ========== //
function confirmLogout() {
    console.log("Fungsi confirmLogout dipanggil."); // Debugging
    console.log("window.Laravel:", window.Laravel); // Debugging

    // Pastikan window.Laravel dan propertinya terdefinisi
    if (typeof window.Laravel === 'undefined' || !window.Laravel.logoutUrl || !window.Laravel.csrfToken) {
        console.error("Kesalahan: Variabel Laravel.logoutUrl atau Laravel.csrfToken tidak terdefinisi.");
        showCustomAlert("Terjadi kesalahan saat logout. Data aplikasi tidak lengkap.");
        return; // Hentikan eksekusi jika variabel tidak lengkap
    }

    showConfirmModal("Apakah Anda yakin ingin keluar?", function(result) {
        if (result) {
            fetch(window.Laravel.logoutUrl, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': window.Laravel.csrfToken,
                    'Content-Type': 'application/json', // Tambahkan header Content-Type
                    'Accept': 'application/json' // Tambahkan header Accept
                }
            })
            .then(response => {
                // Jika responsnya OK (status 2xx), langsung reload halaman.
                // Ini akan memungkinkan Laravel untuk mengarahkan pengguna ke halaman yang sesuai
                // (misalnya halaman login) secara otomatis setelah logout.
                if (response.ok) {
                    window.location.reload(true); // Force a full page reload from the server
                    return; // Hentikan eksekusi lebih lanjut
                } else {
                    // Jika respons tidak OK, coba ambil pesan error.
                    // Cek dulu apakah Content-Type-nya JSON, kalau tidak, anggap teks biasa.
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.indexOf("application/json") !== -1) {
                        return response.json().then(errorData => {
                            throw new Error(errorData.message || "Gagal logout dari server dengan respons JSON.");
                        });
                    } else {
                        return response.text().then(errorText => {
                            // Tampilkan hanya bagian awal teks untuk menghindari log terlalu panjang
                            const truncatedText = errorText.substring(0, 200);
                            throw new Error(`Gagal logout dari server: ${response.status} ${response.statusText}. Respon: ${truncatedText}...`);
                        });
                    }
                }
            })
            .catch(error => {
                console.error("Terjadi kesalahan saat logout:", error);
                showCustomAlert("Gagal logout. Coba lagi: " + error.message);
            });
        }
    });
}

const sidebarLinks = document.querySelectorAll(".sidebar-link");
        const adminContentSections = document.querySelectorAll(
          ".admin-content-section"
        );
        const logoutButton = document.getElementById("logoutButton");

        // Data dummy untuk simulasi CRUD (akan diganti dengan data dari backend)
        let beritaData = [
          {
            id: 1,
            title: "Siswa Meraih Juara Lomba Sains",
            date: "2024-06-10",
            content:
              "Selamat kepada Ananda Budi Santoso yang berhasil meraih juara 1 dalam Lomba Sains tingkat kota Semarang. Prestasi ini menunjukkan dedikasi dan kerja keras siswa kami.",
            imageUrl: "https://placehold.co/400x250/FFD700/000000?text=Berita+1",
          },
          {
            id: 2,
            title: "Workshop Literasi Digital untuk Guru",
            date: "2024-06-05",
            content:
              "SMPN 44 Semarang menyelenggarakan workshop literasi digital untuk meningkatkan kompetensi guru dan karyawan dalam penggunaan teknologi di era modern.",
            imageUrl: "https://placehold.co/400x250/C0C0C0/000000?text=Berita+2",
          },
        ];

        let prestasiData = [
          {
            id: 1,
            title: "Juara 1 Olimpiade Matematika Tingkat Provinsi",
            achiever: "Siti Aisyah (Kelas IX A)",
            date: "Mei 2024",
            description:
              "Siti Aisyah berhasil mengharumkan nama sekolah dengan meraih juara pertama dalam ajang Olimpiade Matematika tingkat provinsi. Selamat!",
            imageUrl:
              "https://placehold.co/400x250/87CEEB/000000?text=Juara+Olimpiade+Matematika",
          },
          {
            id: 2,
            title: "Juara 2 Lomba Baca Puisi Tingkat Kota",
            achiever: "Rio Pratama (Kelas VIII C)",
            date: "April 2024",
            description:
              "Rio Pratama menunjukkan bakatnya dalam seni dengan meraih juara kedua lomba baca puisi tingkat kota Semarang.",
            imageUrl:
              "https://placehold.co/400x250/FFDAB9/000000?text=Juara+Lomba+Puisi",
          },
        ];

        let ekskulData = [
          {
            id: 1,
            name: "Pramuka",
            description:
              "Membentuk karakter disiplin, kemandirian, dan kepemimpinan melalui kegiatan outdoor dan sosial.",
            imageUrl: "https://placehold.co/400x250/90EE90/000000?text=Pramuka",
          },
          {
            id: 2,
            name: "PMR (Palang Merah Remaja)",
            description:
              "Melatih siswa dalam pertolongan pertama, kesehatan, dan kegiatan sosial kemanusiaan.",
            imageUrl: "https://placehold.co/400x250/FFB6C1/000000?text=PMR",
          },
        ];

        // Fungsi untuk menampilkan section admin yang aktif
        function showAdminSection(targetId) {
          adminContentSections.forEach((section) => {
            section.classList.remove("active");
            section.classList.add("hidden"); // Tambahkan hidden untuk transisi opacity
          });
          document.getElementById(targetId).classList.add("active");
          document.getElementById(targetId).classList.remove("hidden");

          // Update active class di sidebar
          sidebarLinks.forEach((link) => {
            link.classList.remove("active-admin-tab");
          });
          document
            .querySelector(`.sidebar-link[data-target="${targetId}"]`)
            .classList.add("active-admin-tab");
        }

        // Event listener untuk sidebar navigasi
        sidebarLinks.forEach((link) => {
          link.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = link.getAttribute("data-target");
            showAdminSection(targetId);
          });
        });

        // Fungsi Logout
        logoutButton.addEventListener("click", () => {
          // Simulasi logout: arahkan kembali ke halaman utama
          // Di sini nanti ada logic untuk menghapus token otentikasi
          window.location.href = "pages.beranda";
        });

        // --- CRUD Berita Functions ---
        const beritaForm = document.getElementById("beritaForm");
        const beritaList = document.getElementById("beritaList");
        const beritaIdInput = document.getElementById("beritaId");
        const beritaTitleInput = document.getElementById("beritaTitle");
        const beritaDateInput = document.getElementById("beritaDate");
        const beritaContentInput = document.getElementById("beritaContent");
        const beritaImageUrlInput = document.getElementById("beritaImageUrl");
        const cancelEditBeritaButton = document.getElementById("cancelEditBerita");

        function renderBerita() {
          beritaList.innerHTML = ""; // Kosongkan tabel
          beritaData.forEach((berita) => {
            const row = beritaList.insertRow();
            row.innerHTML = `
              <td class="py-3 px-6 whitespace-nowrap">${berita.title}</td>
              <td class="py-3 px-6 whitespace-nowrap">${berita.date}</td>
              <td class="py-3 px-6 whitespace-nowrap">
                <button data-id="${berita.id}" class="edit-berita-btn bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-full text-xs mr-2 transition-colors duration-200">
                  <i class="fas fa-edit"></i> Edit
                </button>
                <button data-id="${berita.id}" class="delete-berita-btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-full text-xs transition-colors duration-200">
                  <i class="fas fa-trash"></i> Hapus
                </button>
              </td>
            `;
          });
          addBeritaEventListeners();
        }

        function addBeritaEventListeners() {
          document.querySelectorAll(".edit-berita-btn").forEach((button) => {
            button.addEventListener("click", (e) => {
              const id = parseInt(e.target.dataset.id);
              const berita = beritaData.find((b) => b.id === id);
              if (berita) {
                beritaIdInput.value = berita.id;
                beritaTitleInput.value = berita.title;
                beritaDateInput.value = berita.date;
                beritaContentInput.value = berita.content;
                beritaImageUrlInput.value = berita.imageUrl || "";
                cancelEditBeritaButton.style.display = "inline-block";
              }
            });
          });

          document.querySelectorAll(".delete-berita-btn").forEach((button) => {
            button.addEventListener("click", (e) => {
              const id = parseInt(e.target.dataset.id);
              // Konfirmasi sebelum menghapus
              if (confirm("Yakin ingin menghapus berita ini?")) {
                beritaData = beritaData.filter((b) => b.id !== id);
                renderBerita();
              }
            });
          });
        }

        beritaForm.addEventListener("submit", (e) => {
          e.preventDefault();
          const id = beritaIdInput.value;
          const newBerita = {
            title: beritaTitleInput.value,
            date: beritaDateInput.value,
            content: beritaContentInput.value,
            imageUrl: beritaImageUrlInput.value,
          };

          if (id) {
            // Update berita yang ada
            beritaData = beritaData.map((berita) =>
              berita.id === parseInt(id) ? { ...berita, ...newBerita } : berita
            );
            beritaIdInput.value = ""; // Reset ID
            cancelEditBeritaButton.style.display = "none";
          } else {
            // Tambah berita baru
            newBerita.id = beritaData.length > 0 ? Math.max(...beritaData.map(b => b.id)) + 1 : 1;
            beritaData.push(newBerita);
          }
          beritaForm.reset();
          renderBerita();
        });

        cancelEditBeritaButton.addEventListener("click", () => {
          beritaForm.reset();
          beritaIdInput.value = "";
          cancelEditBeritaButton.style.display = "none";
        });

        // --- CRUD Prestasi Functions ---
        const prestasiForm = document.getElementById("prestasiForm");
        const prestasiList = document.getElementById("prestasiList");
        const prestasiIdInput = document.getElementById("prestasiId");
        const prestasiTitleInput = document.getElementById("prestasiTitle");
        const prestasiAchieverInput = document.getElementById("prestasiAchiever");
        const prestasiDateInput = document.getElementById("prestasiDate");
        const prestasiDescriptionInput = document.getElementById("prestasiDescription");
        const prestasiImageUrlInput = document.getElementById("prestasiImageUrl");
        const cancelEditPrestasiButton = document.getElementById("cancelEditPrestasi");

        function renderPrestasi() {
          prestasiList.innerHTML = "";
          prestasiData.forEach((prestasi) => {
            const row = prestasiList.insertRow();
            row.innerHTML = `
              <td class="py-3 px-6 whitespace-nowrap">${prestasi.title}</td>
              <td class="py-3 px-6 whitespace-nowrap">${prestasi.achiever}</td>
              <td class="py-3 px-6 whitespace-nowrap">
                <button data-id="${prestasi.id}" class="edit-prestasi-btn bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-full text-xs mr-2 transition-colors duration-200">
                  <i class="fas fa-edit"></i> Edit
                </button>
                <button data-id="${prestasi.id}" class="delete-prestasi-btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-full text-xs transition-colors duration-200">
                  <i class="fas fa-trash"></i> Hapus
                </button>
              </td>
            `;
          });
          addPrestasiEventListeners();
        }

        function addPrestasiEventListeners() {
          document.querySelectorAll(".edit-prestasi-btn").forEach((button) => {
            button.addEventListener("click", (e) => {
              const id = parseInt(e.target.dataset.id);
              const prestasi = prestasiData.find((p) => p.id === id);
              if (prestasi) {
                prestasiIdInput.value = prestasi.id;
                prestasiTitleInput.value = prestasi.title;
                prestasiAchieverInput.value = prestasi.achiever;
                prestasiDateInput.value = prestasi.date;
                prestasiDescriptionInput.value = prestasi.description;
                prestasiImageUrlInput.value = prestasi.imageUrl || "";
                cancelEditPrestasiButton.style.display = "inline-block";
              }
            });
          });

          document.querySelectorAll(".delete-prestasi-btn").forEach((button) => {
            button.addEventListener("click", (e) => {
              const id = parseInt(e.target.dataset.id);
              if (confirm("Yakin ingin menghapus prestasi ini?")) {
                prestasiData = prestasiData.filter((p) => p.id !== id);
                renderPrestasi();
              }
            });
          });
        }

        prestasiForm.addEventListener("submit", (e) => {
          e.preventDefault();
          const id = prestasiIdInput.value;
          const newPrestasi = {
            title: prestasiTitleInput.value,
            achiever: prestasiAchieverInput.value,
            date: prestasiDateInput.value,
            description: prestasiDescriptionInput.value,
            imageUrl: prestasiImageUrlInput.value,
          };

          if (id) {
            prestasiData = prestasiData.map((prestasi) =>
              prestasi.id === parseInt(id)
                ? { ...prestasi, ...newPrestasi }
                : prestasi
            );
            prestasiIdInput.value = "";
            cancelEditPrestasiButton.style.display = "none";
          } else {
            newPrestasi.id = prestasiData.length > 0 ? Math.max(...prestasiData.map(p => p.id)) + 1 : 1;
            prestasiData.push(newPrestasi);
          }
          prestasiForm.reset();
          renderPrestasi();
        });

        cancelEditPrestasiButton.addEventListener("click", () => {
          prestasiForm.reset();
          prestasiIdInput.value = "";
          cancelEditPrestasiButton.style.display = "none";
        });

        // --- CRUD Ekstrakurikuler Functions ---
        const ekskulForm = document.getElementById("ekskulForm");
        const ekskulList = document.getElementById("ekskulList");
        const ekskulIdInput = document.getElementById("ekskulId");
        const ekskulNameInput = document.getElementById("ekskulName");
        const ekskulDescriptionInput = document.getElementById("ekskulDescription");
        const ekskulImageUrlInput = document.getElementById("ekskulImageUrl");
        const cancelEditEkskulButton = document.getElementById("cancelEditEkskul");

        function renderEkskul() {
          ekskulList.innerHTML = "";
          ekskulData.forEach((ekskul) => {
            const row = ekskulList.insertRow();
            row.innerHTML = `
              <td class="py-3 px-6 whitespace-nowrap">${ekskul.name}</td>
              <td class="py-3 px-6">${ekskul.description}</td>
              <td class="py-3 px-6 whitespace-nowrap">
                <button data-id="${ekskul.id}" class="edit-ekskul-btn bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-full text-xs mr-2 transition-colors duration-200">
                  <i class="fas fa-edit"></i> Edit
                </button>
                <button data-id="${ekskul.id}" class="delete-ekskul-btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-full text-xs transition-colors duration-200">
                  <i class="fas fa-trash"></i> Hapus
                </button>
              </td>
            `;
          });
          addEkskulEventListeners();
        }

        function addEkskulEventListeners() {
          document.querySelectorAll(".edit-ekskul-btn").forEach((button) => {
            button.addEventListener("click", (e) => {
              const id = parseInt(e.target.dataset.id);
              const ekskul = ekskulData.find((ex) => ex.id === id);
              if (ekskul) {
                ekskulIdInput.value = ekskul.id;
                ekskulNameInput.value = ekskul.name;
                ekskulDescriptionInput.value = ekskul.description;
                ekskulImageUrlInput.value = ekskul.imageUrl || "";
                cancelEditEkskulButton.style.display = "inline-block";
              }
            });
          });

          document.querySelectorAll(".delete-ekskul-btn").forEach((button) => {
            button.addEventListener("click", (e) => {
              const id = parseInt(e.target.dataset.id);
              if (confirm("Yakin ingin menghapus ekstrakurikuler ini?")) {
                ekskulData = ekskulData.filter((ex) => ex.id !== id);
                renderEkskul();
              }
            });
          });
        }

        ekskulForm.addEventListener("submit", (e) => {
          e.preventDefault();
          const id = ekskulIdInput.value;
          const newEkskul = {
            name: ekskulNameInput.value,
            description: ekskulDescriptionInput.value,
            imageUrl: ekskulImageUrlInput.value,
          };

          if (id) {
            ekskulData = ekskulData.map((ekskul) =>
              ekskul.id === parseInt(id)
                ? { ...ekskul, ...newEkskul }
                : ekskul
            );
            ekskulIdInput.value = "";
            cancelEditEkskulButton.style.display = "none";
          } else {
            newEkskul.id = ekskulData.length > 0 ? Math.max(...ekskulData.map(ex => ex.id)) + 1 : 1;
            ekskulData.push(newEkskul);
          }
          ekskulForm.reset();
          renderEkskul();
        });

        cancelEditEkskulButton.addEventListener("click", () => {
          ekskulForm.reset();
          ekskulIdInput.value = "";
          cancelEditEkskulButton.style.display = "none";
        });


        // Inisialisasi: Tampilkan Manajemen Berita saat pertama kali dimuat
        showAdminSection("manage-berita");
        renderBerita();
        renderPrestasi();
        renderEkskul();
