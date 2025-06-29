export function initLoginModal() {
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
}
