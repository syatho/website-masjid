<x-layouts::base title="Halaman Tidak Ditemukan">
    <div class="min-h-screen bg-amber-50 py-12 px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Error Container -->
            <div class="text-center">
                <!-- Icon -->
                <div class="mb-8">
                    <div class="inline-block">
                        <div class="relative">
                            <div class="text-9xl font-bold text-amber-200">404</div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-32 h-32 text-amber-600 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-4-12h8v2h-8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4">
                    Halaman Tidak Ditemukan
                </h1>

                <!-- Description -->
                <p class="text-lg text-amber-700 mb-6 max-w-lg mx-auto leading-relaxed">
                    Maaf, halaman yang Anda cari tidak tersedia. Mungkin sudah dipindahkan atau alamatnya berubah. Silakan kembali ke halaman utama untuk melanjutkan.
                </p>

                <!-- Helpful Text -->
                <div class="bg-gradient-to-br from-amber-50 to-yellow-50 border-2 border-amber-200 rounded-xl p-6 mb-8">
                    <p class="text-amber-800 text-sm mb-4">
                        <strong>Apa yang bisa Anda lakukan:</strong>
                    </p>
                    <ul class="text-amber-700 text-sm space-y-2 text-left">
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Kembali ke halaman beranda</span>
                        </li>
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Periksa kembali alamat halaman</span>
                        </li>
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <span>Hubungi kami jika Anda butuh bantuan</span>
                        </li>
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/" class="px-8 py-4 bg-gradient-to-r from-amber-600 to-amber-700 text-white font-bold rounded-lg hover:from-amber-700 hover:to-amber-800 transition shadow-lg">
                        ← Kembali ke Beranda
                    </a>
                    <a href="#" onclick="history.back(); return false;" class="px-8 py-4 bg-white text-amber-700 font-bold rounded-lg border-2 border-amber-200 hover:bg-amber-50 transition">
                        ← Halaman Sebelumnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts::base>
