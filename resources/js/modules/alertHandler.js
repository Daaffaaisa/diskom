let confirmCallback = null;

export function showCustomAlert(message) {
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

export function showConfirmModal(message, callback) {
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
            if (confirmCallback) confirmCallback(true);
        };

        confirmNo.onclick = () => {
            confirmModal.classList.add('hidden');
            if (confirmCallback) confirmCallback(false);
        };

        confirmModal.onclick = (e) => {
            if (e.target === confirmModal) {
                confirmModal.classList.add('hidden');
                if (confirmCallback) confirmCallback(false);
            }
        };
    }
}
