import { showCustomAlert, showConfirmModal } from '../alertHandler';

export function initGuruTendikManager() {
    const guruTendikListBody = document.getElementById("guruTendikList");
    const guruTendikForm = document.getElementById("guruTendikForm");
    const guruTendikIdInput = document.getElementById("guruTendikId");
    const guruTendikNameInput = document.getElementById("guruTendik");
    const guruTendikJabatanInput = document.getElementById("guruTendikJabatan");
    const guruTendikBidangInput = document.getElementById("guruTendikBidang");
    const guruTendikImageFilesInput = document.getElementById("guruTendikImageFiles");
    const guruTendikImagePreviewDiv = document.getElementById("guruTendikImagePreview");
    const simpanGuruTendikBtn = guruTendikForm ? guruTendikForm.querySelector('button[type="submit"]') : null;
    const cancelEditGuruTendikBtn = document.getElementById("cancelEditguruTendik");

    async function loadGuruTendiks() {
        if (!guruTendikListBody) return;

        guruTendikListBody.innerHTML = '<tr><td colspan="3" class="text-center py-4">Memuat data guru & tendik...</td></tr>';

        try {
            const response = await fetch('/api/guru-tendik');
            if (!response.ok) throw new Error('Gagal memuat data dari server');

            const data = await response.json();
            guruTendikListBody.innerHTML = '';

            if (data.length === 0) {
                guruTendikListBody.innerHTML = '<tr><td colspan="3" class="text-center py-4">Belum ada data guru/tendik.</td></tr>';
            } else {
                data.forEach(item => {
                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6 text-left whitespace-nowrap">${item.nama}</td>
                            <td class="py-3 px-6 text-left">${item.jabatan}</td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex item-center justify-start">
                                    <button class="edit-guru-btn w-4 mr-2 transform hover:text-purple-500 hover:scale-110" data-id="${item.id}" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="delete-guru-btn w-4 mr-2 transform hover:text-red-500 hover:scale-110" data-id="${item.id}" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    guruTendikListBody.insertAdjacentHTML('beforeend', row);
                });

                guruTendikListBody.querySelectorAll('.edit-guru-btn').forEach(btn => {
                    btn.addEventListener('click', () => editGuruTendik(btn.dataset.id));
                });

                guruTendikListBody.querySelectorAll('.delete-guru-btn').forEach(btn => {
                    btn.addEventListener('click', () => deleteGuruTendik(btn.dataset.id));
                });
            }

        } catch (error) {
            console.error(error);
            showCustomAlert("Gagal memuat data guru & tendik: " + error.message);
        }
    }

    function resetGuruTendikForm() {
        if (!guruTendikForm) return;

        guruTendikForm.reset();
        guruTendikIdInput.value = '';
        if (guruTendikImagePreviewDiv) guruTendikImagePreviewDiv.innerHTML = '';
        if (simpanGuruTendikBtn) {
            simpanGuruTendikBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Guru dan Tendik';
            simpanGuruTendikBtn.disabled = false;
        }
        if (cancelEditGuruTendikBtn) cancelEditGuruTendikBtn.style.display = 'none';
        if (guruTendikImageFilesInput) guruTendikImageFilesInput.value = '';
    }

    async function editGuruTendik(id) {
        try {
            const response = await fetch(`/api/guru-tendik/${id}`);
            if (!response.ok) throw new Error("Gagal mengambil data untuk diedit");

            const data = await response.json();

            guruTendikIdInput.value = data.id;
            guruTendikNameInput.value = data.nama;
            guruTendikDescriptionInput.value = data.jabatan;

            guruTendikImagePreviewDiv.innerHTML = '';
            if (data.foto) {
                const img = document.createElement('img');
                img.src = `/${data.foto}`;
                img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow-sm');
                guruTendikImagePreviewDiv.appendChild(img);
            }

            if (simpanGuruTendikBtn) simpanGuruTendikBtn.innerHTML = '<i class="fas fa-sync-alt mr-2"></i>Update Guru/Tendik';
            if (cancelEditGuruTendikBtn) cancelEditGuruTendikBtn.style.display = 'inline-block';

            showCustomAlert('Mode edit aktif untuk: ' + data.nama);

        } catch (error) {
            console.error(error);
            showCustomAlert("Gagal memuat data edit: " + error.message);
        }
    }

    async function deleteGuruTendik(id) {
        showConfirmModal("Yakin ingin menghapus data ini?", async function(result) {
            if (!result) return;

            try {
                const res = await fetch(`/api/guru-tendik/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': window.Laravel.csrfToken,
                        'Accept': 'application/json'
                    }
                });

                if (!res.ok) throw new Error("Gagal menghapus data");

                showCustomAlert("Data berhasil dihapus!");
                loadGuruTendiks();
                resetGuruTendikForm();

            } catch (error) {
                console.error(error);
                showCustomAlert("Gagal menghapus data: " + error.message);
            }
        });
    }

    if (guruTendikImageFilesInput) {
        guruTendikImageFilesInput.addEventListener('change', function() {
            guruTendikImagePreviewDiv.innerHTML = '';
            for (const file of this.files) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow-sm');
                    guruTendikImagePreviewDiv.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    if (guruTendikForm) {
        guruTendikForm.addEventListener("submit", async function(e) {
            e.preventDefault();

            const id = guruTendikIdInput.value;
            const url = id ? `/api/guru-tendik/${id}` : '/api/guru-tendik';
            const formData = new FormData();

            formData.append('nama', guruTendikNameInput.value);
            formData.append('jabatan', guruTendikJabatanInput.value);
            
            if (guruTendikImageFilesInput && guruTendikImageFilesInput.files.length > 0) {
                formData.append('foto', guruTendikImageFilesInput.files[0]);
            }

            if (id) formData.append('_method', 'PATCH');
            formData.append('_token', window.Laravel.csrfToken);

            if (simpanGuruTendikBtn) {
                simpanGuruTendikBtn.disabled = true;
                simpanGuruTendikBtn.innerHTML = id ? 'Mengupdate...' : 'Menyimpan...';
            }

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) throw new Error(data.message || 'Gagal menyimpan data');

                showCustomAlert(data.message || 'Data berhasil disimpan!');
                resetGuruTendikForm();
                loadGuruTendiks();

            } catch (error) {
                console.error(error);
                showCustomAlert("Gagal menyimpan/memperbarui data: " + error.message);
            } finally {
                if (simpanGuruTendikBtn) {
                    simpanGuruTendikBtn.disabled = false;
                    simpanGuruTendikBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Guru dan Tendik';
                }
            }
        });
    }

    if (cancelEditGuruTendikBtn) {
        cancelEditGuruTendikBtn.addEventListener('click', () => {
            resetGuruTendikForm();
            showCustomAlert('Edit guru/tendik dibatalkan.');
        });
    }

    return loadGuruTendiks;
}
