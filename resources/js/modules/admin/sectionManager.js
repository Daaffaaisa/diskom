export function initAdminSectionNavigation(callbacks = {}) {
    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    const adminContentSections = document.querySelectorAll(".admin-content-section");

    function showAdminSection(targetId) {
        adminContentSections.forEach((section) => {
            section.classList.remove("active");
            section.classList.add("hidden");
        });
        document.getElementById(targetId).classList.add("active");
        document.getElementById(targetId).classList.remove("hidden");

        sidebarLinks.forEach((link) => {
            link.classList.remove("active-admin-tab");
        });
        const activeLink = document.querySelector(`.sidebar-link[data-target="${targetId}"]`);
        if (activeLink) activeLink.classList.add("active-admin-tab");

        if (callbacks[targetId]) callbacks[targetId](); // loadData sesuai tab
    }

    sidebarLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = link.getAttribute("data-target");
            showAdminSection(targetId);
        });
    });

    // Buka default tab
    showAdminSection('manage-berita');
}
