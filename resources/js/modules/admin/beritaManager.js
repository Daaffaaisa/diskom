import { showCustomAlert, showConfirmModal } from '../alertHandler';

export function initBeritaManager() {
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

    async function loadBeritas() {
  // Fungsi untuk memuat dan menampilkan berita dari API
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
    // Trigger load saat tab dibuka
    return loadBeritas;
}
