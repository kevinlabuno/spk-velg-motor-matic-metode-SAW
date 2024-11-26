document.addEventListener('DOMContentLoaded', () => {
    const toggleSidebar = document.getElementById('toggleSidebar'); // Tombol toggle
    const sidebar = document.getElementById('sidebar'); // Sidebar
    const mainContent = document.getElementById('main-content'); // Konten utama

    // Validasi elemen tersedia di DOM
    if (!toggleSidebar || !sidebar || !mainContent) {
        console.error("Sidebar, toggle button, or main content not found in the DOM.");
        return;
    }

    // Tambahkan event listener untuk toggle sidebar
    toggleSidebar.addEventListener('click', () => {
        sidebar.classList.toggle('show')
        mainContent.classList.toggle('sidebar-expanded');
    });

    // Klik di luar sidebar untuk menutup (opsional)
    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggle = toggleSidebar.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('show')) {
            sidebar.classList.remove('show');
            mainContent.classList.remove('sidebar-expanded');
        }
    });
});
