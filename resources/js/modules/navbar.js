export function initNavbarScrollEffect() {
    const navbar = document.getElementById("navbar");

    if (navbar) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.remove("bg-transparent");
                navbar.classList.add("bg-[#8B3A75]");
            } else {
                navbar.classList.remove("bg-[#8B3A75]");
                navbar.classList.add("bg-transparent");
            }
        });
    }
}
