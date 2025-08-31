<?php include 'include/Navbar.php'; ?>

<main class="min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Error Icon -->
            <div class="mb-8">
                <svg class="mx-auto h-32 w-32 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.5-.935-6.072-2.456M15 11.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>

            <!-- Error Message -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                <h1 class="text-6xl font-bold text-primary mb-4">404</h1>
                <h2 class="text-3xl font-bold text-dark mb-6">Halaman Tidak Ditemukan</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Maaf, halaman yang Anda cari tidak dapat ditemukan. 
                    Mungkin halaman telah dipindahkan, dihapus, atau URL yang Anda masukkan salah.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="index.php" class="bg-accent text-dark py-3 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                        Kembali ke Beranda
                    </a>
                    <a href="index.php?route=list" class="bg-primary text-white py-3 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                        Lihat List Destinasi
                    </a>
                </div>
            </div>

            <!-- Helpful Links -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold text-dark mb-4">Mungkin Anda Mencari:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="index.php" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary hover:bg-gray-50 transition-colors">
                        <svg class="h-6 w-6 text-primary mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-dark">Beranda</h4>
                            <p class="text-sm text-gray-600">Halaman utama dengan rekomendasi</p>
                        </div>
                    </a>

                    <a href="index.php?route=list" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary hover:bg-gray-50 transition-colors">
                        <svg class="h-6 w-6 text-primary mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-dark">List Destinasi</h4>
                            <p class="text-sm text-gray-600">Jelajahi semua destinasi wisata</p>
                        </div>
                    </a>

                    <a href="index.php?route=riwayat-booking" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary hover:bg-gray-50 transition-colors">
                        <svg class="h-6 w-6 text-primary mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-dark">Riwayat Transaksi</h4>
                            <p class="text-sm text-gray-600">Lihat booking dan transaksi Anda</p>
                        </div>
                    </a>
                    
                    <a href="index.php?route=topup" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-primary hover:bg-gray-50 transition-colors">
                        <svg class="h-6 w-6 text-primary mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-dark">Top Up Saldo</h4>
                            <p class="text-sm text-gray-600">Isi ulang saldo akun Anda</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'include/Footer.php'; ?>
