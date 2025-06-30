export function initKeluhKesahAdmin() {
    const container = document.getElementById("keluhKesahList");

    if (!container) return;

    container.innerHTML = `<div class="text-center col-span-full py-6 text-gray-500">Memuat data keluh kesah...</div>`;

    fetch('/api/keluh-kesah', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        container.innerHTML = '';

        if (data.length === 0) {
            container.innerHTML = `<div class="text-center col-span-full py-6 text-gray-500">Belum ada keluh kesah yang masuk.</div>`;
            return;
        }

        data.forEach(keluh => {
            const card = document.createElement("div");
            card.className = "bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow border border-gray-200";

            function formatDate(datetimeStr) {
                const date = new Date(datetimeStr);
                const year = date.getFullYear();
                const month = (`0${date.getMonth() + 1}`).slice(-2);
                const day = (`0${date.getDate()}`).slice(-2);
                return `${year}/${month}/${day}`;
            }

            card.innerHTML = `
                <div class="mb-2">
                    <p class="text-sm text-gray-600"><i class="fas fa-user mr-1 text-purple-600"></i><span class="font-medium">Nama:</span> ${keluh.name || '-'}</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-envelope mr-1 text-purple-600"></i><span class="font-medium">Email:</span> ${keluh.email || '-'}</p>
                    <p class="text-xs text-gray-500 mt-1"><i class="fas fa-clock mr-1"></i> ${formatDate(keluh.created_at)}</p>
                </div>
                <button class="bacaKeluhBtn bg-purple-100 hover:bg-purple-200 text-purple-800 text-sm font-medium py-1 px-3 rounded-full mt-2" 
                    data-name="${keluh.name}" 
                    data-email="${keluh.email}" 
                    data-date="${keluh.created_at}" 
                    data-message="${encodeURIComponent(keluh.message)}">
                    <i class="fas fa-eye mr-1"></i> Baca Keluh Kesah
                </button>
            `;

            container.appendChild(card);

            const btn = card.querySelector('.bacaKeluhBtn');
            if (btn) {
                btn.addEventListener('click', () => {
                    const detail = {
                        name: btn.dataset.name,
                        email: btn.dataset.email,
                        created_at: btn.dataset.date,
                        message: decodeURIComponent(btn.dataset.message),
                    };
                    showKeluhPopup(detail);
                });
            }
        });
    })
    .catch(err => {
        console.error(err);
        container.innerHTML = `<div class="text-center col-span-full py-6 text-red-500">Gagal memuat data: ${err.message}</div>`;
    });

    function showKeluhPopup(keluh) {
        const oldModal = document.getElementById("keluhPopupModal");
        if (oldModal) oldModal.remove();

        function formatDate(datetimeStr) {
            const date = new Date(datetimeStr);
            const year = date.getFullYear();
            const month = (`0${date.getMonth() + 1}`).slice(-2);
            const day = (`0${date.getDate()}`).slice(-2);
            return `${day}/${month}/${year}`;
        }

        const modal = document.createElement("div");
        modal.id = "keluhPopupModal";
        modal.className = "fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50";

        modal.innerHTML = `
            <div class="bg-white rounded-lg p-6 max-w-md w-full shadow-lg relative animate-fadeIn max-h-[80vh] overflow-y-auto">
                <button class="absolute top-2 right-2 text-gray-500 hover:text-red-600" onclick="document.getElementById('keluhPopupModal').remove()">
                    <i class="fas fa-times"></i>
                </button>

                <div class="w-12 h-12 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-comment-dots text-xl"></i>
                </div>

                <h3 class="text-xl font-bold text-[#B7669A] mb-2 text-center">Detail Keluh Kesah</h3>

                <div class="text-sm text-gray-600 mb-4 space-y-1">
                    <p><i class="fas fa-user text-purple-500 mr-2"></i><strong>Nama:</strong> ${keluh.name || '-'}</p>
                    <p><i class="fas fa-envelope text-purple-500 mr-2"></i><strong>Email:</strong> ${keluh.email || '-'}</p>
                    <p><i class="fas fa-clock text-purple-500 mr-2"></i><strong>Tanggal:</strong> ${formatDate(keluh.created_at)}</p>
                </div>

                <hr class="mb-4">
                <p class="text-gray-800 whitespace-pre-line leading-relaxed text-sm">${keluh.message}</p>

                <button id="copyMessageBtn" class="mt-4 text-sm text-[#B7669A] hover:underline flex items-center">
                    <i class="fas fa-copy mr-2"></i>Salin Pesan
                </button>
            </div>
        `;

        document.body.appendChild(modal);

        // Fitur salin pesan
        setTimeout(() => {
            const copyBtn = document.getElementById('copyMessageBtn');
            if (copyBtn) {
                copyBtn.addEventListener('click', () => {
                    navigator.clipboard.writeText(keluh.message);
                    copyBtn.innerHTML = `<i class="fas fa-check mr-2"></i> Disalin!`;
                    setTimeout(() => {
                        copyBtn.innerHTML = `<i class="fas fa-copy mr-2"></i>Salin Pesan`;
                    }, 2000);
                });
            }
        }, 100);
    }
}
