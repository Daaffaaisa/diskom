import { showCustomAlert, showConfirmModal } from '../alertHandler';

export function initPrestasiManager() {

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

        // Event listener untuk tombol Batal Edit ekstrakurikuler
    if (cancelEditPrestasiBtn) {
        cancelEditPrestasiBtn.addEventListener('click', () => {
            resetPrestasiForm();
            showCustomAlert('Mode edit Prestasi dibatalkan.');
        });
    }
    // Trigger load saat tab dibuka
    return loadPrestasis;
    
}