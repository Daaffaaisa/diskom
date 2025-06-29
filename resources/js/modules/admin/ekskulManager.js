import { showCustomAlert, showConfirmModal } from '../alertHandler';

export function initEkskulManager() {

    
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


    return loadEkskuls;
}