<style>
/* Styling sidebar */
#sidebar {
    width: 16rem; /* w-64 */
    height: 100vh; /* h-screen */
    position: fixed;
    top: 4rem; /* Top sesuai header */
    left: 0;
    background-color: #1f2937; /* Warna sidebar */
    color: #f8fafc; /* Warna teks */
    transform: translateX(-100%);
    transition: transform 0.3s ease;
}

#sidebar.md\:translate-x-0 {
    transform: translateX(0);
}

#sidebar a {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    color: #f8fafc;
    text-decoration: none;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    transition: background-color 0.3s ease, color 0.3s ease;
}

#sidebar a:hover {
    background-color: #374151;
    color: #ffffff;
}

#sidebar a i {
    margin-right: 0.75rem;
    color: #94a3b8;
}

#sidebar a:hover i {
    color: #ffffff;
}

#sidebar a.active {
    background-color: #4b5563;
    font-weight: bold;
}

@media (max-width: 768px) {
    #sidebar {
        top: 4rem;
    }
}
</style>

<div id="sidebar" class="md:translate-x-0">
    <nav class="mt-6">
        <!-- Menu untuk semua pengguna (jika belum login) -->
        @guest
        <a href="{{ url('beranda') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-home"></i> Beranda
        </a>
        <a href="{{ url('algoritma') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-file-alt"></i> Algoritma
        </a>
        <a href="{{ url('data') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-chart-bar"></i> Data
        </a>
        <a href="{{ url('pemilihan') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-cogs"></i> Pemilihan Alternatif
        </a>
        <a href="{{ url('dataalternatif') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-archive"></i> Data Alternatif
        </a>
        @if(\App\Models\Data::count() > 0 && \App\Models\Bobot::count() > 0)
        <a href="{{ url('perhitungan') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-layer-group"></i> Perhitungan
        </a>
        @endif
        @endguest

        <!-- Menu untuk pengguna login -->
        @auth
        <a href="{{ url('dataalternatif') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-archive"></i> Data Alternatif
        </a>
        <a href="{{ url('pemilihan') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-cogs"></i> Pemilihan Alternatif
        </a>
        @if(\App\Models\Data::count() > 0 && \App\Models\Bobot::count() > 0)
        <a href="{{ url('perhitungan') }}" class="flex items-center px-6 py-3 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-layer-group"></i> Perhitungan
        </a>
        @endif
        @endauth
    </nav>
</div>
