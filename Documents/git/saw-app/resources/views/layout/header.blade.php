<style>
/* Styling header */
header {
    background-color: #1f2937;
    color: #f8fafc;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

header .btn-login {
    background-color: #ffffff;
    color: #1f2937;
    padding: 5px 10px;
    border-radius: 5px;
    margin-left: 10px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

header .btn-login:hover {
    background-color: #d7d9db;
    transform: scale(1.05);
}

@media (max-width: 768px) {
    header .btn-login {
        font-size: 14px;
    }
}

#dropdownMenu a {
    font-size: 16px;
    transition: font-size 0.3s ease;
}

img.rounded-full:focus + #dropdownMenu a,
img.rounded-full:active + #dropdownMenu a {
    font-size: 18px;
}

@media (max-width: 768px) {
    #dropdownMenu a {
        font-size: 14px;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    #dropdownMenu a {
        font-size: 15px;
    }
}
</style>

<header class="fixed top-0 left-0 right-0 z-20 flex items-center justify-between px-6 py-4 shadow-md">
    <button id="toggleSidebar" class="text-2xl focus:outline-none md:hidden">
        <i class="fas fa-bars"></i>
    </button>
    <h1 class="text-2xl font-bold">SPK</h1>
    <div class="relative">
        @if(Auth::check())
        <img src="assets/img/main-image.jpg" alt="Profile" style="object-fit: cover" class="w-10 h-10 rounded-full cursor-pointer hover:shadow-lg" id="profileDropdown" aria-haspopup="true" aria-expanded="false">
        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-gray-700 text-gray-200 rounded-lg shadow-lg hidden opacity-0 transition-opacity duration-300" role="menu">
            <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-600" style="color:white" role="menuitem">
                <i class="fas fa-user-circle mr-2"></i> {{ Auth::user()->name }}
            </a>
            <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-600" style="color:white" role="menuitem">
                <i class="fas fa-envelope mr-2"></i> {{ Auth::user()->email }}
            </a>
            <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-600" style="color:white" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt mr-2"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @else
        <a href="{{ route('login') }}" class="btn-login" style="color:dark">Masuk</a>
        <a href="{{ url('/') }}" class="btn-login" style="color:dark">Kembali</a>
        @endif
    </div>
</header>

<script>
    // Toggle sidebar
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');

    toggleSidebar.addEventListener('click', () => {
        sidebar.classList.toggle('translate-x-0');
        sidebar.classList.toggle('-translate-x-full');
    });

    // Toggle profile dropdown
    const profileDropdown = document.getElementById('profileDropdown');
    const dropdownMenu = document.getElementById('dropdownMenu');

    profileDropdown.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
        dropdownMenu.classList.toggle('opacity-0');
        dropdownMenu.classList.toggle('opacity-100');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!profileDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            dropdownMenu.classList.remove('opacity-100');
            dropdownMenu.classList.add('opacity-0');
        }
    });
</script>
