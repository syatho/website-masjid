<?php
// @var string $active (optional) - active page name
$active = $active ?? 'home';
?>

<nav class="sticky top-0 z-50 bg-white border-b border-amber-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="/" class="flex-shrink-0 flex items-center gap-2 hover:opacity-80 transition">
                <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-amber-700 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                    S
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-amber-900">MASJID SYATHO</span>
                    <span class="text-xs text-amber-700">Rembang</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="/" class="text-amber-900 hover:text-amber-700 font-medium transition {{ $active === 'home' ? 'border-b-2 border-amber-700' : '' }}">
                    Beranda
                </a>
                <a href="#tentang" class="text-amber-700 hover:text-amber-600 transition">
                    Tentang
                </a>
                <a href="#fasilitas" class="text-amber-700 hover:text-amber-600 transition">
                    Fasilitas
                </a>
                <a href="#kontak" class="text-amber-700 hover:text-amber-600 transition">
                    Kontak
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button class="text-amber-700 hover:text-amber-600" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden pb-4 border-t border-amber-100">
            <a href="/" class="block px-3 py-2 text-amber-900 hover:bg-amber-50 rounded">Beranda</a>
            <a href="#tentang" class="block px-3 py-2 text-amber-700 hover:bg-amber-50 rounded">Tentang</a>
            <a href="#fasilitas" class="block px-3 py-2 text-amber-700 hover:bg-amber-50 rounded">Fasilitas</a>
            <a href="#kontak" class="block px-3 py-2 text-amber-700 hover:bg-amber-50 rounded">Kontak</a>
        </div>
    </div>
</nav>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
}
</script>
