export function initKeluhKesahModal() {
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
    }
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
