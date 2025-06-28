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

    // ========== Carousel dalam Card (Berita di Halaman Public & Admin Dashboard) ========== //
    document.querySelectorAll(".group").forEach((card) => {
        const trackCard = card.querySelector(".carousel-track");
        const prevCardBtn = card.querySelector(".prev-btn");
        const nextCardBtn = card.querySelector(".next-btn");

        if (!trackCard || !prevCardBtn || !nextCardBtn) return;

        const slides = trackCard.querySelectorAll("div.w-full");
        let indexCard = 0;
        const totalCardSlides = slides.length;

        if (totalCardSlides <= 1) {
            prevCardBtn.style.display = 'none';
            nextCardBtn.style.display = 'none';
            return;
        }

        function updateCardCarousel() {
            trackCard.style.transform = `translateX(-${indexCard * 100}%)`;
        }

        setInterval(() => {
            indexCard = (indexCard + 1) % totalCardSlides;
            updateCardCarousel();
        }, 5000); // Auto-slide every 5 seconds

        prevCardBtn.addEventListener("click", () => {
            indexCard = (indexCard - 1 + totalCardSlides) % totalCardSlides;
            updateCardCarousel();
        });

        nextCardBtn.addEventListener("click", () => {
            indexCard = (indexCard + 1) % totalCardSlides;
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

            if (keluhKesahModal) {
                keluhKesahModal.classList.remove("show");
                keluhKesahModal.classList.add("hidden");
            }

            alertBox.classList.remove("hidden");
            alertBox.classList.add("opacity-100");

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
                    'X-CSRF-TOKEN': window.Laravel.csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(res => {
                    const contentType = res.headers.get("content-type");
                    if (contentType && contentType.includes("application/json")) {
                        return res.json();
                    } else {
                        return res.text().then(text => {
                            console.error("Respons dari server saat login bukan JSON. Ini isinya:", text);
                            throw new Error("Respons server tidak valid. Silakan cek kredensial Anda.");
                        });
                    }
                })
                .then(data => {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        showCustomAlert(data.message || data.error || "Login gagal! Periksa username dan password Anda.");
                    }
                })
                .catch((error) => {
                    console.error("Terjadi kesalahan saat login:", error);
                    showCustomAlert("Terjadi kesalahan saat login: " + error.message);
                });
        });
    }

    // ========== Event listener untuk tombol logout ========== //
    const logoutLink = document.getElementById('logoutLink');
    if (logoutLink) {
        logoutLink.addEventListener('click', function (event) {
            event.preventDefault();
            confirmLogout();
        });
    }

    // Global Functions (karena dipanggil dari HTML atau perlu diakses dari mana saja)
    window.toggleDropdown = function (id) {
        const dropdown = document.getElementById(id);
        if (dropdown) {
            dropdown.classList.toggle('hidden');
        }
    };

    window.showCustomAlert = function (message) {
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

    let confirmCallback = null;
    window.showConfirmModal = function (message, callback) {
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

    window.confirmLogout = function () {
        console.log("Fungsi confirmLogout dipanggil.");
        if (typeof window.Laravel === 'undefined' || !window.Laravel.logoutUrl || !window.Laravel.csrfToken) {
            console.error("Kesalahan: Variabel Laravel.logoutUrl atau Laravel.csrfToken tidak terdefinisi.");
            showCustomAlert("Terjadi kesalahan saat logout. Data aplikasi tidak lengkap.", "error");
            return;
        }

        showConfirmModal("Apakah Anda yakin ingin keluar?", function (result) {
            if (result) {
                fetch(window.Laravel.logoutUrl, {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': window.Laravel.csrfToken,
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    // Tangani 419 (Page Expired) atau 401 (Unauthorized) secara eksplisit
                    if (response.status === 419 || response.status === 401) {
                        console.warn("Logout attempt: CSRF token expired or unauthorized (419/401). Forcing redirect to homepage.");
                        showCustomAlert("Sesi Anda telah berakhir atau token tidak valid. Anda akan diarahkan ke halaman utama.", "warning");
                        window.location.href = '/'; // Paksa redirect
                        return; // Hentikan pemrosesan promise lebih lanjut
                    }

                    // Jika respons berhasil (2xx status code)
                    // PENTING: Baik response.ok maupun response.redirected (jika terjadi) harus memicu redirect penuh
                    // Karena fetch tidak otomatis memuat halaman baru setelah redirect internal.
                    if (response.ok || response.redirected) { // Menggabungkan kondisi
                        console.log("Logout successful. Forcing full page navigation to homepage.");
                        showCustomAlert("Logout berhasil. Anda akan diarahkan ke halaman utama.", "success");
                        window.location.href = '/'; // <--- INI KUNCI: SELALU PAKSA REDIRECT DI SINI JIKA SUKSES
                        return; // Hentikan promise chain
                    } 
                    
                    // Jika ada status error lain selain 419/401
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.includes("application/json")) {
                        return response.json().then(errorData => {
                            throw new Error(errorData.message || `Server error: ${response.status} ${response.statusText}`);
                        });
                    } else {
                        // Jika bukan JSON, mungkin itu halaman error HTML (seperti 500 Internal Server Error)
                        return response.text().then(errorText => {
                            const truncatedText = errorText.substring(0, 200); 
                            throw new Error(`Non-JSON server error: ${response.status} ${response.statusText}. Response part: ${truncatedText}...`);
                        });
                    }
                })
                .catch(error => {
                    console.error("Terjadi kesalahan saat logout:", error);
                    // Tampilkan error jika bukan error yang sudah ditangani (misal network error)
                    if (!error.message.includes("Sesi Anda telah berakhir") && !error.message.includes("token tidak valid")) {
                         showCustomAlert("Gagal logout. Terjadi kesalahan jaringan atau server: " + error.message);
                    }
                });
            }
        });
    }

    // --- LOGIC UNTUK DASHBOARD ADMIN (Di sini fokus CRUD) ---

    // Deklarasi variabel untuk elemen-elemen DOM di awal scope agar bisa diakses di mana saja
    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    const adminContentSections = document.querySelectorAll(".admin-content-section");
    const logoutButton = document.getElementById("logoutButton");

    // Variabel untuk elemen-elemen form dan tabel berita
    const beritaListBody = document.getElementById("beritaList");
    const beritaForm = document.getElementById("beritaForm");
    const beritaIdInput = document.getElementById("beritaId");
    const beritaTitleInput = document.getElementById("beritaTitle");
    const beritaDateInput = document.getElementById("beritaDate");
    const beritaContentInput = document.getElementById("beritaContent");
    const beritaImageFilesInput = document.getElementById("beritaImageFiles");
    const beritaImagePreviewDiv = document.getElementById("beritaImagePreview");
    const simpanBeritaBtn = beritaForm ? beritaForm.querySelector('button[type="submit"]') : null;
    const cancelEditBeritaBtn = document.getElementById("cancelEditBerita");

    // Variabel untuk elemen-elemen form dan tabel prestasi
    const prestasiListBody = document.getElementById("prestasiList");
    const prestasiForm = document.getElementById("prestasiForm");
    const prestasiIdInput = document.getElementById("prestasiId");
    const prestasiTitleInput = document.getElementById("prestasiTitle");
    const prestasiAchieverInput = document.getElementById("prestasiAchiever");
    const prestasiPeriodeInput = document.getElementById("prestasiPeriode");
    const prestasiTahunInput = document.getElementById("prestasiTahun");
    const prestasiDescriptionInput = document.getElementById("prestasiDescription");
    const prestasiImageFilesInput = document.getElementById("prestasiImageFiles");
    const prestasiImagePreviewDiv = document.getElementById("prestasiImagePreview");
    const simpanPrestasiBtn = prestasiForm ? prestasiForm.querySelector('button[type="submit"]') : null;
    const cancelEditPrestasiBtn = document.getElementById("cancelEditPrestasi"); 

    // Variabel untuk elemen-elemen form dan tabel ekstrakurikuler
    const ekskulListBody = document.getElementById("ekskulList");
    const ekskulForm = document.getElementById("ekskulForm");
    const ekskulIdInput = document.getElementById("ekskulId");
    const ekskulNameInput = document.getElementById("ekskulName");
    const ekskulDescriptionInput = document.getElementById("ekskulDescription");
    const ekskulImageFilesInput = document.getElementById("ekskulImageFiles");
    const ekskulImagePreviewDiv = document.getElementById("ekskulImagePreview");
    const simpanEkskulBtn = ekskulForm ? ekskulForm.querySelector('button[type="submit"]') : null;
    const cancelEditEkskulBtn = document.getElementById("cancelEditEkskul");


    // Fungsi untuk menampilkan section admin yang aktif
    function showAdminSection(targetId) {
        adminContentSections.forEach((section) => {
            section.classList.remove("active");
            section.classList.add("hidden");
        });
        document.getElementById(targetId).classList.add("active");
        document.getElementById(targetId).classList.remove("hidden");

        sidebarLinks.forEach((link) => {
            link.classList.remove("active-admin-tab");
        });
        document
            .querySelector(`.sidebar-link[data-target="${targetId}"]`)
            .classList.add("active-admin-tab");

        // Panggil load data sesuai tab yang aktif
        if (targetId === 'manage-berita') {
            loadBeritas();
        } else if (targetId === 'manage-prestasi') {
            loadPrestasis();
        } else if (targetId === 'manage-ekstrakurikuler') {
            loadEkskuls();
        }
    }

    // Event listener untuk sidebar navigasi
    sidebarLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = link.getAttribute("data-target");
            showAdminSection(targetId);
        });
    });

    // Panggil showAdminSection untuk tab default saat halaman dimuat
    showAdminSection('manage-berita');

    // ========== CRUD Berita (Manajemen Berita) LOGIC ========= //

    // Fungsi untuk memuat dan menampilkan berita dari API
    async function loadBeritas() {
        if (!beritaListBody) {
            console.error("Elemen #beritaList tidak ditemukan di HTML admin dashboard.");
            return;
        }

        beritaListBody.innerHTML = '<tr><td colspan="3" class="text-center py-4">Memuat data berita...</td></tr>';

        try {
            const response = await fetch('/api/beritas', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                }
            });

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({ message: response.statusText }));
                throw new Error(errorData.message || 'Gagal memuat berita dari server.');
            }

            const beritas = await response.json();

            beritaListBody.innerHTML = '';

            if (beritas.length === 0) {
                beritaListBody.innerHTML = '<tr><td colspan="3" class="text-center py-4">Belum ada data berita.</td></tr>';
            } else {
                beritas.forEach(berita => {
                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6 text-left whitespace-nowrap">${berita.judul}</td>
                            <td class="py-3 px-6 text-left">${berita.tanggal}</td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex item-center justify-start">
                                    <button
                                        class="edit-berita-btn w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                        data-id="${berita.id}" title="Edit"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button
                                        class="delete-berita-btn w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                        data-id="${berita.id}" title="Hapus"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    beritaListBody.insertAdjacentHTML('beforeend', row);
                });

                // Pasang event listener untuk tombol edit dan delete setelah HTML di-render
                beritaListBody.querySelectorAll('.edit-berita-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        editBerita(id);
                    });
                });

                beritaListBody.querySelectorAll('.delete-berita-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        deleteBerita(id);
                    });
                });
            }

        } catch (error) {
            console.error("Error saat memuat berita:", error);
            beritaListBody.innerHTML = `<tr><td colspan="3" class="text-center py-4 text-red-500">Error: ${error.message}</td></tr>`;
            showCustomAlert("Gagal memuat daftar berita: " + error.message);
        }
    }

    // Fungsi untuk mereset form berita
    function resetBeritaForm() {
        if (!beritaForm) return;

        beritaForm.reset();
        beritaIdInput.value = '';
        if (beritaImagePreviewDiv) {
            beritaImagePreviewDiv.innerHTML = '';
        }
        if (simpanBeritaBtn) {
            simpanBeritaBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Berita';
            simpanBeritaBtn.disabled = false;
        }
        if (cancelEditBeritaBtn) {
            cancelEditBeritaBtn.style.display = 'none';
        }
        if (beritaImageFilesInput) {
            beritaImageFilesInput.value = '';
        }
    }

    // Fungsi untuk mengisi form dengan data berita yang akan diedit
    async function editBerita(id) {
        try {
            const response = await fetch(`/api/beritas/${id}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                }
            });

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({ message: response.statusText }));
                throw new Error(errorData.message || 'Gagal mengambil data berita untuk diedit.');
            }

            const berita = await response.json();

            // Isi form dengan data berita
            beritaIdInput.value = berita.id;
            beritaTitleInput.value = berita.judul;

            // Pastikan tanggal diformat ke `YYYY-MM-DD` untuk input type="date"
            if (berita.tanggal) {
                const dateObj = new Date(berita.tanggal);
                const year = dateObj.getFullYear();
                const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                const day = dateObj.getDate().toString().padStart(2, '0');
                beritaDateInput.value = `${year}-${month}-${day}`;
            } else {
                beritaDateInput.value = '';
            }

            beritaContentInput.value = berita.konten;

            // Tampilkan gambar yang sudah ada
            if (beritaImagePreviewDiv) {
                beritaImagePreviewDiv.innerHTML = '';
                if (berita.gambar && Array.isArray(berita.gambar) && berita.gambar.length > 0) {
                    berita.gambar.forEach(imgUrl => {
                        const imgWrapper = document.createElement('div');
                        imgWrapper.classList.add('relative');

                        const img = document.createElement('img');
                        img.src = `/${imgUrl}`; // Path relatif dari public folder
                        img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow-sm');
                        imgWrapper.appendChild(img);

                        const deleteImgBtn = document.createElement('button');
                        deleteImgBtn.classList.add(
                            'absolute', 'top-1', 'right-1', 'bg-red-500', 'text-white', 'rounded-full',
                            'w-6', 'h-6', 'flex', 'items-center', 'justify-center', 'text-xs', 'opacity-80',
                            'hover:opacity-100', 'transition-opacity'
                        );
                        deleteImgBtn.innerHTML = '<i class="fas fa-times"></i>';
                        deleteImgBtn.dataset.imagePath = imgUrl; // Simpan path gambar di data-attribute
                        deleteImgBtn.addEventListener('click', function() {
                            if (confirm('Yakin ingin menghapus gambar ini dari berita? (Perubahan akan disimpan saat berita diupdate)')) {
                                imgWrapper.remove();
                            }
                        });
                        imgWrapper.appendChild(deleteImgBtn);
                        beritaImagePreviewDiv.appendChild(imgWrapper);
                    });
                }
            }

            // Ubah teks tombol dan tampilkan tombol batal
            if (simpanBeritaBtn) {
                simpanBeritaBtn.innerHTML = '<i class="fas fa-sync-alt mr-2"></i>Update Berita';
            }
            if (cancelEditBeritaBtn) {
                cancelEditBeritaBtn.style.display = 'inline-block';
            }

            showCustomAlert('Mode edit aktif untuk berita: ' + berita.judul);

        } catch (error) {
            console.error("Error saat mengambil data berita untuk edit:", error);
            showCustomAlert("Gagal memuat data edit: " + error.message);
        }
    }

    // Fungsi untuk menghapus berita
    async function deleteBerita(id) {
        showConfirmModal("Apakah Anda yakin ingin menghapus berita ini?", async function(result) {
            if (result) {
                try {
                    const url = `/api/beritas/${id}`;
                    const method = 'DELETE';

                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            'X-CSRF-TOKEN': window.Laravel.csrfToken,
                            'Accept': 'application/json',
                        },
                    });

                    if (!response.ok) {
                        const errorData = await response.json().catch(() => ({ message: response.statusText }));
                        throw new Error(errorData.message || 'Gagal menghapus berita dari server.');
                    }

                    showCustomAlert('Berita berhasil dihapus!');
                    loadBeritas();
                    resetBeritaForm();
                } catch (error) {
                    console.error("Error saat menghapus berita:", error);
                    showCustomAlert("Gagal menghapus berita: " + error.message);
                }
            } else {
                showCustomAlert('Penghapusan berita dibatalkan.');
            }
        });
    }

    // Event Listener untuk preview gambar
    if (beritaImageFilesInput) {
        beritaImageFilesInput.addEventListener('change', function() {
            if (beritaImagePreviewDiv) {
                beritaImagePreviewDiv.innerHTML = '';
            }
            if (this.files && this.files.length > 0) {
                for (const file of this.files) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow-sm');
                        if (beritaImagePreviewDiv) {
                            beritaImagePreviewDiv.appendChild(img);
                        }
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    }

    // Event Listener untuk submit form berita (CREATE & UPDATE)
    if (beritaForm) {
        beritaForm.addEventListener("submit", async function (e) {
            e.preventDefault();

            const beritaId = beritaIdInput.value;
            const url = beritaId ? `/api/beritas/${beritaId}` : '/api/beritas';
            const method = 'POST';

            const formData = new FormData();
            formData.append('judul', beritaTitleInput.value);
            formData.append('tanggal', beritaDateInput.value);
            formData.append('konten', beritaContentInput.value);

            if (beritaImageFilesInput && beritaImageFilesInput.files.length > 0) {
                for (const file of beritaImageFilesInput.files) {
                    formData.append('gambar_baru[]', file);
                }
            }

            if (beritaId && beritaImagePreviewDiv) {
                const existingImages = beritaImagePreviewDiv.querySelectorAll('img');
                existingImages.forEach(img => {
                    if (img.src.includes('/assets/berita_images/')) {
                        const pathSegments = img.src.split('/assets/berita_images/');
                        if (pathSegments.length > 1) {
                            formData.append('gambar_lama[]', 'assets/berita_images/' + pathSegments[1]);
                        }
                    }
                });
            }

            if (beritaId) {
                formData.append('_method', 'PATCH');
            }

            formData.append('_token', window.Laravel.csrfToken);

            if (simpanBeritaBtn) {
                simpanBeritaBtn.disabled = true;
                simpanBeritaBtn.innerHTML = beritaId ? 'Mengupdate...' : 'Menyimpan...';
            }

            try {
                const response = await fetch(url, {
                    method: method,
                    body: formData,
                });

                const data = await response.json();

                if (!response.ok) {
                    let errorMessage = data.message || 'Terjadi kesalahan saat menyimpan berita.';
                    if (data.errors) {
                        errorMessage += "\n" + Object.values(data.errors).map(e => e.join(', ')).join('\n');
                    }
                    throw new Error(errorMessage);
                }

                showCustomAlert(data.message || (beritaId ? 'Berita berhasil diupdate!' : 'Berita berhasil disimpan!'));
                resetBeritaForm();
                loadBeritas();

            } catch (error) {
                console.error("Error saat menyimpan/mengupdate berita:", error);
                showCustomAlert("Gagal menyimpan/mengupdate berita: " + error.message);
            } finally {
                if (simpanBeritaBtn) {
                    simpanBeritaBtn.disabled = false;
                    simpanBeritaBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Berita';
                }
            }
        });
    }

    // Event listener untuk tombol Batal Edit
    if (cancelEditBeritaBtn) {
        cancelEditBeritaBtn.addEventListener('click', () => {
            resetBeritaForm();
            showCustomAlert('Mode edit dibatalkan.');
        });
    }

    // ========== CRUD Prestasi (Manajemen Prestasi) LOGIC ========= //

    // Fungsi untuk memuat dan menampilkan prestasi dari API
    async function loadPrestasis() {
        if (!prestasiListBody) {
            console.error("Elemen #prestasiList tidak ditemukan di HTML admin dashboard.");
            return;
        }

        prestasiListBody.innerHTML = '<tr><td colspan="4" class="text-center py-4">Memuat data prestasi...</td></tr>';

        try {
            const response = await fetch('/api/prestasis', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                }
            });

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({ message: response.statusText }));
                throw new Error(errorData.message || 'Gagal memuat prestasi dari server.');
            }

            const prestasis = await response.json();

            prestasiListBody.innerHTML = '';

            if (prestasis.length === 0) {
                prestasiListBody.innerHTML = '<tr><td colspan="4" class="text-center py-4">Belum ada data prestasi.</td></tr>';
            } else {
                prestasis.forEach(prestasi => {
                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6 text-left whitespace-nowrap">${prestasi.judul}</td>
                            <td class="py-3 px-6 text-left">${prestasi.pencapai}</td>
                            <td class="py-3 px-6 text-left">${prestasi.periode}</td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex item-center justify-start">
                                    <button
                                        class="edit-prestasi-btn w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                        data-id="${prestasi.id}" title="Edit"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button
                                        class="delete-prestasi-btn w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                        data-id="${prestasi.id}" title="Hapus"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    prestasiListBody.insertAdjacentHTML('beforeend', row);
                });

                // Pasang event listener untuk tombol edit dan delete setelah HTML di-render
                prestasiListBody.querySelectorAll('.edit-prestasi-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        editPrestasi(id);
                    });
                });

                prestasiListBody.querySelectorAll('.delete-prestasi-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        deletePrestasi(id);
                    });
                });
            }

        } catch (error) {
            console.error("Error saat memuat prestasi:", error);
            prestasiListBody.innerHTML = `<tr><td colspan="4" class="text-center py-4 text-red-500">Error: ${error.message}</td></tr>`;
            showCustomAlert("Gagal memuat daftar prestasi: " + error.message);
        }
    }

    // Fungsi untuk mereset form prestasi
    function resetPrestasiForm() {
        if (!prestasiForm) return;

        prestasiForm.reset();
        prestasiIdInput.value = '';
        if (prestasiImagePreviewDiv) {
            prestasiImagePreviewDiv.innerHTML = '';
        }
        if (simpanPrestasiBtn) {
            simpanPrestasiBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Prestasi';
            simpanPrestasiBtn.disabled = false;
        }
        if (cancelEditPrestasiBtn) {
            cancelEditPrestasiBtn.style.display = 'none';
        }
        if (prestasiImageFilesInput) {
            prestasiImageFilesInput.value = '';
        }
        prestasiTahunInput.value = '';
    }

    // Fungsi untuk mengisi form dengan data prestasi yang akan diedit
    async function editPrestasi(id) {
        try {
            const response = await fetch(`/api/prestasis/${id}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                }
            });

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({ message: response.statusText }));
                throw new Error(errorData.message || 'Gagal mengambil data prestasi untuk diedit.');
            }

            const prestasi = await response.json();

            prestasiIdInput.value = prestasi.id;
            prestasiTitleInput.value = prestasi.judul;
            prestasiAchieverInput.value = prestasi.pencapai;
            prestasiPeriodeInput.value = prestasi.periode;
            prestasiTahunInput.value = prestasi.tahun;
            prestasiDescriptionInput.value = prestasi.deskripsi_singkat;

            // Tampilkan gambar yang sudah ada
            if (prestasiImagePreviewDiv) {
                prestasiImagePreviewDiv.innerHTML = '';
                if (prestasi.gambar && Array.isArray(prestasi.gambar) && prestasi.gambar.length > 0) {
                    prestasi.gambar.forEach(imgUrl => {
                        const imgWrapper = document.createElement('div');
                        imgWrapper.classList.add('relative');

                        const img = document.createElement('img');
                        img.src = `/${imgUrl}`; // Path relatif dari public folder
                        img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow-sm');
                        imgWrapper.appendChild(img);

                        const deleteImgBtn = document.createElement('button');
                        deleteImgBtn.classList.add(
                            'absolute', 'top-1', 'right-1', 'bg-red-500', 'text-white', 'rounded-full',
                            'w-6', 'h-6', 'flex', 'items-center', 'justify-center', 'text-xs', 'opacity-80',
                            'hover:opacity-100', 'transition-opacity'
                        );
                        deleteImgBtn.innerHTML = '<i class="fas fa-times"></i>';
                        deleteImgBtn.dataset.imagePath = imgUrl; // Simpan path gambar di data-attribute
                        deleteImgBtn.addEventListener('click', function() {
                            if (confirm('Yakin ingin menghapus gambar ini dari prestasi? (Perubahan akan disimpan saat prestasi diupdate)')) {
                                imgWrapper.remove();
                            }
                        });
                        imgWrapper.appendChild(deleteImgBtn);
                        prestasiImagePreviewDiv.appendChild(imgWrapper);
                    });
                }
            }

            // Ubah teks tombol dan tampilkan tombol batal
            if (simpanPrestasiBtn) {
                simpanPrestasiBtn.innerHTML = '<i class="fas fa-sync-alt mr-2"></i>Update Prestasi';
            }
            if (cancelEditPrestasiBtn) {
                cancelEditPrestasiBtn.style.display = 'inline-block';
            }

            showCustomAlert('Mode edit aktif untuk prestasi: ' + prestasi.judul);

        } catch (error) {
            console.error("Error saat mengambil data prestasi untuk edit:", error);
            showCustomAlert("Gagal memuat data edit: " + error.message);
        }
    }

    // Fungsi untuk menghapus prestasi
    async function deletePrestasi(id) {
        showConfirmModal("Apakah Anda yakin ingin menghapus prestasi ini?", async function(result) {
            if (result) {
                try {
                    const url = `/api/prestasis/${id}`;
                    const method = 'DELETE';

                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            'X-CSRF-TOKEN': window.Laravel.csrfToken,
                            'Accept': 'application/json',
                        },
                    });

                    if (!response.ok) {
                        const errorData = await response.json().catch(() => ({ message: response.statusText }));
                        throw new Error(errorData.message || 'Gagal menghapus prestasi dari server.');
                    }

                    showCustomAlert('Prestasi berhasil dihapus!');
                    loadPrestasis();
                    resetPrestasiForm();
                } catch (error) {
                    console.error("Error saat menghapus prestasi:", error);
                    showCustomAlert("Gagal menghapus prestasi: " + error.message);
                }
            } else {
                showCustomAlert('Penghapusan prestasi dibatalkan.');
            }
        });
    }

    // Event Listener untuk preview gambar prestasi
    if (prestasiImageFilesInput) {
        prestasiImageFilesInput.addEventListener('change', function() {
            if (prestasiImagePreviewDiv) {
                prestasiImagePreviewDiv.innerHTML = '';
            }
            if (this.files && this.files.length > 0) {
                for (const file of this.files) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow-sm');
                        if (prestasiImagePreviewDiv) {
                            prestasiImagePreviewDiv.appendChild(img);
                        }
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    }

    // Event Listener untuk submit form prestasi (CREATE & UPDATE)
    if (prestasiForm) {
        prestasiForm.addEventListener("submit", async function (e) {
            e.preventDefault();

            const prestasiId = prestasiIdInput.value;
            const url = prestasiId ? `/api/prestasis/${prestasiId}` : '/api/prestasis';
            const method = 'POST';

            const formData = new FormData();
            formData.append('judul', prestasiTitleInput.value);
            formData.append('pencapai', prestasiAchieverInput.value);
            formData.append('periode', prestasiPeriodeInput.value);
            formData.append('tahun', prestasiTahunInput.value);
            formData.append('deskripsi_singkat', prestasiDescriptionInput.value);

            if (prestasiImageFilesInput && prestasiImageFilesInput.files.length > 0) {
                for (const file of prestasiImageFilesInput.files) {
                    formData.append('gambar_baru[]', file);
                }
            }

            if (prestasiId && prestasiImagePreviewDiv) {
                const existingImages = prestasiImagePreviewDiv.querySelectorAll('img');
                existingImages.forEach(img => {
                    if (img.src.includes('/assets/prestasi_images/')) {
                        const pathSegments = img.src.split('/assets/prestasi_images/');
                        if (pathSegments.length > 1) {
                            formData.append('gambar_lama[]', 'assets/prestasi_images/' + pathSegments[1]);
                        }
                    }
                });
            }

            if (prestasiId) {
                formData.append('_method', 'PATCH');
            }

            formData.append('_token', window.Laravel.csrfToken);

            if (simpanPrestasiBtn) {
                simpanPrestasiBtn.disabled = true;
                simpanPrestasiBtn.innerHTML = prestasiId ? 'Mengupdate...' : 'Menyimpan...';
            }

            try {
                const response = await fetch(url, {
                    method: method,
                    body: formData,
                });

                const data = await response.json();

                if (!response.ok) {
                    let errorMessage = data.message || 'Terjadi kesalahan saat menyimpan prestasi.';
                    if (data.errors) {
                        errorMessage += "\n" + Object.values(data.errors).map(e => e.join(', ')).join('\n');
                    }
                    throw new Error(errorMessage);
                }

                showCustomAlert(data.message || (prestasiId ? 'Prestasi berhasil diupdate!' : 'Prestasi berhasil disimpan!'));
                resetPrestasiForm();
                loadPrestasis();

            } catch (error) {
                console.error("Error saat menyimpan/mengupdate prestasi:", error);
                showCustomAlert("Gagal menyimpan/mengupdate prestasi: " + error.message);
            } finally {
                if (simpanPrestasiBtn) {
                    simpanPrestasiBtn.disabled = false;
                    simpanPrestasiBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Prestasi';
                }
            }
        });
    }


    // ========== CRUD Ekstrakurikuler (Manajemen Ekstrakurikuler) LOGIC ========= //

    // Fungsi untuk memuat dan menampilkan ekstrakurikuler dari API
    async function loadEkskuls() {
        if (!ekskulListBody) {
            console.error("Elemen #ekskulList tidak ditemukan di HTML admin dashboard.");
            return;
        }

        ekskulListBody.innerHTML = '<tr><td colspan="3" class="text-center py-4">Memuat data ekstrakurikuler...</td></tr>';

        try {
            const response = await fetch('/api/ekstrakurikulers', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                }
            });

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({ message: response.statusText }));
                throw new Error(errorData.message || 'Gagal memuat ekstrakurikuler dari server.');
            }

            const ekskuls = await response.json();

            ekskulListBody.innerHTML = '';

            if (ekskuls.length === 0) {
                ekskulListBody.innerHTML = '<tr><td colspan="3" class="text-center py-4">Belum ada data ekstrakurikuler.</td></tr>';
            } else {
                ekskuls.forEach(ekskul => {
                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6 text-left whitespace-nowrap">${ekskul.nama}</td>
                            <td class="py-3 px-6 text-left">${ekskul.deskripsi ? ekskul.deskripsi.substring(0, 100) + (ekskul.deskripsi.length > 100 ? '...' : '') : '-'}</td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex item-center justify-start">
                                    <button
                                        class="edit-ekskul-btn w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                        data-id="${ekskul.id}" title="Edit"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button
                                        class="delete-ekskul-btn w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                        data-id="${ekskul.id}" title="Hapus"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    ekskulListBody.insertAdjacentHTML('beforeend', row);
                });

                // Pasang event listener untuk tombol edit dan delete setelah HTML di-render
                ekskulListBody.querySelectorAll('.edit-ekskul-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        editEkskul(id);
                    });
                });

                ekskulListBody.querySelectorAll('.delete-ekskul-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        deleteEkskul(id);
                    });
                });
            }

        } catch (error) {
            console.error("Error saat memuat ekstrakurikuler:", error);
            ekskulListBody.innerHTML = `<tr><td colspan="3" class="text-center py-4 text-red-500">Error: ${error.message}</td></tr>`;
            showCustomAlert("Gagal memuat daftar ekstrakurikuler: " + error.message);
        }
    }

    // Fungsi untuk mereset form ekstrakurikuler
    function resetEkskulForm() {
        if (!ekskulForm) return;

        ekskulForm.reset();
        ekskulIdInput.value = '';
        if (ekskulImagePreviewDiv) {
            ekskulImagePreviewDiv.innerHTML = '';
        }
        if (simpanEkskulBtn) {
            simpanEkskulBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Ekstrakurikuler';
            simpanEkskulBtn.disabled = false;
        }
        if (cancelEditEkskulBtn) {
            cancelEditEkskulBtn.style.display = 'none';
        }
        if (ekskulImageFilesInput) {
            ekskulImageFilesInput.value = '';
        }
    }

    // Fungsi untuk mengisi form dengan data ekstrakurikuler yang akan diedit
    async function editEkskul(id) {
        try {
            const response = await fetch(`/api/ekstrakurikulers/${id}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                }
            });

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({ message: response.statusText }));
                throw new Error(errorData.message || 'Gagal mengambil data ekstrakurikuler untuk diedit.');
            }

            const ekskul = await response.json();

            ekskulIdInput.value = ekskul.id;
            ekskulNameInput.value = ekskul.nama;
            ekskulDescriptionInput.value = ekskul.deskripsi;

            // Tampilkan gambar yang sudah ada
            if (ekskulImagePreviewDiv) {
                ekskulImagePreviewDiv.innerHTML = '';
                if (ekskul.gambar && Array.isArray(ekskul.gambar) && ekskul.gambar.length > 0) {
                    ekskul.gambar.forEach(imgUrl => {
                        const imgWrapper = document.createElement('div');
                        imgWrapper.classList.add('relative');

                        const img = document.createElement('img');
                        img.src = `/${imgUrl}`;
                        img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow-sm');
                        imgWrapper.appendChild(img);

                        const deleteImgBtn = document.createElement('button');
                        deleteImgBtn.classList.add(
                            'absolute', 'top-1', 'right-1', 'bg-red-500', 'text-white', 'rounded-full',
                            'w-6', 'h-6', 'flex', 'items-center', 'justify-center', 'text-xs', 'opacity-80',
                            'hover:opacity-100', 'transition-opacity'
                        );
                        deleteImgBtn.innerHTML = '<i class="fas fa-times"></i>';
                        deleteImgBtn.dataset.imagePath = imgUrl;
                        deleteImgBtn.addEventListener('click', function() {
                            if (confirm('Yakin ingin menghapus gambar ini dari ekstrakurikuler? (Perubahan akan disimpan saat ekstrakurikuler diupdate)')) {
                                imgWrapper.remove();
                            }
                        });
                        imgWrapper.appendChild(deleteImgBtn);
                        ekskulImagePreviewDiv.appendChild(imgWrapper);
                    });
                }
            }

            // Ubah teks tombol dan tampilkan tombol batal
            if (simpanEkskulBtn) {
                simpanEkskulBtn.innerHTML = '<i class="fas fa-sync-alt mr-2"></i>Update Ekstrakurikuler';
            }
            if (cancelEditEkskulBtn) {
                cancelEditEkskulBtn.style.display = 'inline-block';
            }

            showCustomAlert('Mode edit aktif untuk ekstrakurikuler: ' + ekskul.nama);

        } catch (error) {
            console.error("Error saat mengambil data ekstrakurikuler untuk edit:", error);
            showCustomAlert("Gagal memuat data edit: " + error.message);
        }
    }

    // Fungsi untuk menghapus ekstrakurikuler
    async function deleteEkskul(id) {
        showConfirmModal("Apakah Anda yakin ingin menghapus ekstrakurikuler ini?", async function(result) {
            if (result) {
                try {
                    const url = `/api/ekstrakurikulers/${id}`;
                    const method = 'DELETE';

                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            'X-CSRF-TOKEN': window.Laravel.csrfToken,
                            'Accept': 'application/json',
                        },
                    });

                    if (!response.ok) {
                        const errorData = await response.json().catch(() => ({ message: response.statusText }));
                        throw new Error(errorData.message || 'Gagal menghapus ekstrakurikuler dari server.');
                    }

                    showCustomAlert('Ekstrakurikuler berhasil dihapus!');
                    loadEkskuls();
                    resetEkskulForm();
                } catch (error) {
                    console.error("Error saat menghapus ekstrakurikuler:", error);
                    showCustomAlert("Gagal menghapus ekstrakurikuler: " + error.message);
                }
            } else {
                showCustomAlert('Penghapusan ekstrakurikuler dibatalkan.');
            }
        });
    }

    // Event Listener untuk preview gambar ekstrakurikuler
    if (ekskulImageFilesInput) {
        ekskulImageFilesInput.addEventListener('change', function() {
            if (ekskulImagePreviewDiv) {
                ekskulImagePreviewDiv.innerHTML = '';
            }
            if (this.files && this.files.length > 0) {
                for (const file of this.files) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow-sm');
                        if (ekskulImagePreviewDiv) {
                            ekskulImagePreviewDiv.appendChild(img);
                        }
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    }

    // Event Listener untuk submit form ekstrakurikuler (CREATE & UPDATE)
    if (ekskulForm) {
        ekskulForm.addEventListener("submit", async function (e) {
            e.preventDefault();

            const ekskulId = ekskulIdInput.value;
            const url = ekskulId ? `/api/ekstrakurikulers/${ekskulId}` : '/api/ekstrakurikulers';
            const method = 'POST';

            const formData = new FormData();
            formData.append('nama', ekskulNameInput.value);
            formData.append('deskripsi', ekskulDescriptionInput.value);

            if (ekskulImageFilesInput && ekskulImageFilesInput.files.length > 0) {
                for (const file of ekskulImageFilesInput.files) {
                    formData.append('gambar_baru[]', file);
                }
            }

            if (ekskulId && ekskulImagePreviewDiv) {
                const existingImages = ekskulImagePreviewDiv.querySelectorAll('img');
                existingImages.forEach(img => {
                    if (img.src.includes('/assets/ekstrakurikuler_images/')) {
                        const pathSegments = img.src.split('/assets/ekstrakurikuler_images/');
                        if (pathSegments.length > 1) {
                            formData.append('gambar_lama[]', 'assets/ekstrakurikuler_images/' + pathSegments[1]);
                        }
                    }
                });
            }

            if (ekskulId) {
                formData.append('_method', 'PATCH');
            }

            formData.append('_token', window.Laravel.csrfToken);

            if (simpanEkskulBtn) {
                simpanEkskulBtn.disabled = true;
                simpanEkskulBtn.innerHTML = ekskulId ? 'Mengupdate...' : 'Menyimpan...';
            }

            try {
                const response = await fetch(url, {
                    method: method,
                    body: formData,
                });

                const data = await response.json();

                if (!response.ok) {
                    let errorMessage = data.message || 'Terjadi kesalahan saat menyimpan ekstrakurikuler.';
                    if (data.errors) {
                        errorMessage += "\n" + Object.values(data.errors).map(e => e.join(', ')).join('\n');
                    }
                    throw new Error(errorMessage);
                }

                showCustomAlert(data.message || (ekskulId ? 'Ekstrakurikuler berhasil diupdate!' : 'Ekstrakurikuler berhasil disimpan!'));
                resetEkskulForm();
                loadEkskuls();

            } catch (error) {
                console.error("Error saat menyimpan/mengupdate ekstrakurikuler:", error);
                showCustomAlert("Gagal menyimpan/mengupdate ekstrakurikuler: " + error.message);
            } finally {
                if (simpanEkskulBtn) {
                    simpanEkskulBtn.disabled = false;
                    simpanEkskulBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Ekstrakurikuler';
                }
            }
        });
    }

    // Event listener untuk tombol Batal Edit ekstrakurikuler
    if (cancelEditEkskulBtn) {
        cancelEditEkskulBtn.addEventListener('click', () => {
            resetEkskulForm();
            showCustomAlert('Mode edit ekstrakurikuler dibatalkan.');
        });
    }

}); // Tutup DOMContentLoaded