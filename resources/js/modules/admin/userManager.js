import { showCustomAlert, showConfirmModal } from '../alertHandler';

export function initUserManager() {

    // Variabel untuk elemen-elemen form dan tabel user
    const userListBody = document.getElementById("userList");
    const userForm = document.getElementById("userForm");
    const userIdInput = document.getElementById("userId");
    const userNameInput = document.getElementById("userName");
    const userEmailInput = document.getElementById("userEmail");
    const userPasswordInput = document.getElementById("userPassword");
    const userRoleInput = document.getElementById("userRole"); // Pastikan ini adalah select element
    const simpanUserBtn = userForm ? userForm.querySelector('button[type="submit"]') : null;
    const cancelEditUserBtn = document.getElementById("cancelEditUser");

    // ========== CRUD USER (Manajemen USEr) LOGIC ========= //

// Fungsi untuk memuat dan menampilkan user dari API (READ)
async function loadUsers() {
    if (!userListBody) {
        console.error("Elemen #userList tidak ditemukan di HTML admin dashboard.");
        return;
    }

    userListBody.innerHTML = '<tr><td colspan="4" class="text-center py-4">Memuat data user...</td></tr>';

    try {
        const response = await fetch('/api/users', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': window.Laravel.csrfToken, // Kirim token untuk otentikasi API
            }
        });

        if (!response.ok) {
            const errorData = await response.json().catch(() => ({ message: response.statusText }));
            throw new Error(errorData.message || 'Gagal memuat user dari server.');
        }

        const users = await response.json();

        userListBody.innerHTML = '';

        if (users.length === 0) {
            userListBody.innerHTML = '<tr><td colspan="4" class="text-center py-4">Belum ada data user lain.</td></tr>';
        } else {
            users.forEach(user => {
                const row = `
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6 text-left whitespace-nowrap">${user.name}</td>
                        <td class="py-3 px-6 text-left">${user.email}</td>
                        <td class="py-3 px-6 text-left">${user.role}</td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex item-center justify-start">
                                <button
                                    class="edit-user-btn w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    data-id="${user.id}" title="Edit"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button
                                    class="delete-user-btn w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                    data-id="${user.id}" title="Hapus"
                                >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
                userListBody.insertAdjacentHTML('beforeend', row);
            });

            // Pasang event listener untuk tombol edit dan delete setelah HTML di-render
            userListBody.querySelectorAll('.edit-user-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    editUser(id);
                });
            });

            userListBody.querySelectorAll('.delete-user-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    deleteUser(id);
                });
            });
        }

    } catch (error) {
        console.error("Error saat memuat user:", error);
        userListBody.innerHTML = `<tr><td colspan="4" class="text-center py-4 text-red-500">Error: ${error.message}</td></tr>`;
        showCustomAlert("Gagal memuat daftar user: " + error.message);
    }
}

// Fungsi untuk mereset form user
function resetUserForm() {
    if (!userForm) return;

    userForm.reset();
    userIdInput.value = '';
    userNameInput.value = '';
    userEmailInput.value = '';
    userPasswordInput.value = ''; // Kosongkan password saat reset
    userRoleInput.value = ''; // Reset role ke default
    if (simpanUserBtn) {
        simpanUserBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan User';
        simpanUserBtn.disabled = false;
    }
    if (cancelEditUserBtn) {
        cancelEditUserBtn.style.display = 'none';
    }
    userPasswordInput.required = true; // Password wajib saat create
}

// Fungsi untuk mengisi form dengan data user yang akan diedit (EDIT)
async function editUser(id) {
    try {
        const response = await fetch(`/api/users/${id}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': window.Laravel.csrfToken,
            }
        });

        if (!response.ok) {
            const errorData = await response.json().catch(() => ({ message: response.statusText }));
            throw new Error(errorData.message || 'Gagal mengambil data user untuk diedit.');
        }

        const user = await response.json();

        userIdInput.value = user.id;
        userNameInput.value = user.name;
        userEmailInput.value = user.email;
        userRoleInput.value = user.role;
        userPasswordInput.value = ''; // Kosongkan password saat edit, tidak akan ditampilkan
        userPasswordInput.required = false; // Password tidak wajib saat edit

        // Ubah teks tombol dan tampilkan tombol batal
        if (simpanUserBtn) {
            simpanUserBtn.innerHTML = '<i class="fas fa-sync-alt mr-2"></i>Update User';
        }
        if (cancelEditUserBtn) {
            cancelEditUserBtn.style.display = 'inline-block';
        }

        showCustomAlert('Mode edit aktif untuk user: ' + user.name);

    } catch (error) {
        console.error("Error saat mengambil data user untuk edit:", error);
        showCustomAlert("Gagal memuat data edit: " + error.message);
    }
}

// Fungsi untuk menghapus user (DELETE)
async function deleteUser(id) {
    showConfirmModal("Apakah Anda yakin ingin menghapus user ini? (Anda tidak bisa menghapus akun Anda sendiri)", async function(result) {
        if (result) {
            try {
                const url = `/api/users/${id}`;
                const method = 'DELETE';

                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': window.Laravel.csrfToken,
                        'Accept': 'application/json',
                    },
                });

                // Tangani respons 403 (Forbidden) dari backend
                if (response.status === 403) {
                    const errorData = await response.json().catch(() => ({ message: response.statusText }));
                    showCustomAlert(errorData.message || 'Anda tidak diizinkan melakukan aksi ini.', "error");
                    return; // Hentikan proses
                }

                if (!response.ok) {
                    const errorData = await response.json().catch(() => ({ message: response.statusText }));
                    throw new Error(errorData.message || 'Gagal menghapus user dari server.');
                }

                showCustomAlert('User berhasil dihapus!');
                loadUsers();
                resetUserForm();
            } catch (error) {
                console.error("Error saat menghapus user:", error);
                showCustomAlert("Gagal menghapus user: " + error.message);
            }
        } else {
            showCustomAlert('Penghapusan user dibatalkan.');
        }
    });
}

// Event Listener untuk submit form user (CREATE & UPDATE)
if (userForm) {
    userForm.addEventListener("submit", async function (e) {
        e.preventDefault();

        const userId = userIdInput.value;
        const url = userId ? `/api/users/${userId}` : '/api/users';
        const method = 'POST'; // Untuk PUT/PATCH kita pakai _method

        const formData = new FormData();
        formData.append('name', userNameInput.value);
        formData.append('email', userEmailInput.value);
        // Hanya tambahkan password jika diisi (untuk update)
        if (userPasswordInput.value) {
            formData.append('password', userPasswordInput.value);
        }
        formData.append('role', userRoleInput.value);

        if (userId) {
            formData.append('_method', 'PATCH');
        }

        formData.append('_token', window.Laravel.csrfToken);

        if (simpanUserBtn) {
            simpanUserBtn.disabled = true;
            simpanUserBtn.innerHTML = userId ? 'Mengupdate...' : 'Menyimpan...';
        }

        try {
            const response = await fetch(url, {
                method: method,
                body: formData,
            });

            let responseData; // Deklarasikan responseData di sini

            // Tangani respons 422 (Validasi)
            if (response.status === 422) {
                responseData = await response.json(); // Isi responseData dengan error validasi
                let errorMessage = 'Validasi gagal:';
                if (responseData.errors) {
                    Object.values(responseData.errors).forEach(messages => {
                        messages.forEach(message => {
                            errorMessage += "\n- " + message;
                        });
                    });
                }
                showCustomAlert(errorMessage, "error");
                return; // Hentikan proses
            }

            // Tangani respons non-OK lainnya (e.g., 403, 500)
            if (!response.ok) {
                const contentType = response.headers.get("content-type");
                if (contentType && contentType.includes("application/json")) {
                    responseData = await response.json(); // Isi responseData dengan error JSON
                    throw new Error(responseData.message || `Server error: ${response.status} ${response.statusText}`);
                } else {
                    const errorText = await response.text();
                    const truncatedText = errorText.substring(0, 200);
                    throw new Error(`Non-JSON server error: ${response.status} ${response.statusText}. Response part: ${truncatedText}...`);
                }
            }
            if (!responseData) { // Jika belum terisi dari 422 atau non-OK branch (fallback)
                responseData = await response.json();
            }

            showCustomAlert(responseData.message || (userId ? 'User berhasil diupdate!' : 'User berhasil disimpan!'));
            resetUserForm();
            loadUsers();

        } catch (error) {
            console.error("Error saat menyimpan/mengupdate user:", error);
            let errorMessage = "Gagal menyimpan/mengupdate user: ";
            if (error.message) {
                errorMessage += error.message;
            } else if (error.response && error.response.status) {
                errorMessage += `Server responded with status ${error.response.status}.`;
            } else {
                errorMessage += "Terjadi kesalahan tidak terduga.";
            }
            showCustomAlert(errorMessage, "error");
        } finally {
            if (simpanUserBtn) {
                simpanUserBtn.disabled = false;
                simpanUserBtn.innerHTML = userId ? '<i class="fas fa-sync-alt mr-2"></i>Update User' : '<i class="fas fa-save mr-2"></i>Simpan User';
            }
        }
    });
}

// Event listener untuk tombol Batal Edit user
if (cancelEditUserBtn) {
    cancelEditUserBtn.addEventListener('click', () => {
        resetUserForm();
        showCustomAlert('Mode edit user dibatalkan.');
    });
}

    return loadUsers;
}
