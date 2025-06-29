import { showCustomAlert, showConfirmModal } from './alertHandler';

export function initAjaxLogin() {
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
                            throw new Error("Respons server tidak valid. Silakan cek kredensial Anda.");
                        });
                    }
                })
                .then(data => {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        showCustomAlert(data.message || data.error || "Login gagal! Periksa username dan password.");
                    }
                })
                .catch((error) => {
                    console.error("Login error:", error);
                    showCustomAlert("Terjadi kesalahan saat login: " + error.message);
                });
        });
    }
}

const logoutButton = document.getElementById("logoutButton");

export function initLogoutHandler() {
    const logoutLink = document.getElementById('logoutLink');
    if (logoutLink) {
        logoutLink.addEventListener('click', function (event) {
            event.preventDefault();
            confirmLogout();
        });
    }
}

function confirmLogout() {
    if (typeof window.Laravel === 'undefined' || !window.Laravel.logoutUrl || !window.Laravel.csrfToken) {
        showCustomAlert("Terjadi kesalahan saat logout. Data aplikasi tidak lengkap.");
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
                if (response.status === 419 || response.status === 401) {
                    showCustomAlert("Sesi Anda telah berakhir atau token tidak valid. Anda akan diarahkan ke halaman utama.");
                    window.location.href = '/';
                    return;
                }
                if (response.ok || response.redirected) {
                    showCustomAlert("Logout berhasil. Anda akan diarahkan ke halaman utama.");
                    window.location.href = '/';
                    return;
                }

                return response.text().then(errorText => {
                    throw new Error(`Logout error: ${errorText.substring(0, 200)}`);
                });
            })
            .catch(error => {
                console.error("Logout error:", error);
                showCustomAlert("Gagal logout: " + error.message);
            });
        }
    });
}
