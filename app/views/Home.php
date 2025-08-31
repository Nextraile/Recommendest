<?php include 'include/Navbar.php'; ?>

<main class="min-h-screen">
    <section class="bg-gradient-to-r from-primary to-accent text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Temukan Destinasi Impian Anda</h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">Jelajahi keindahan Semarang dengan rekomendasi terpersonalisasi</p>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-2xl font-bold text-dark mb-6">Profil Pengguna</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <h3 class="text-lg font-semibold text-dark">Nama</h3>
                        <p class="text-primary font-bold text-xl"><?= $_SESSION['nama'] ?? 'John Doe'; ?></p>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <h3 class="text-lg font-semibold text-dark">Saldo</h3>
                        <p class="text-accent font-bold text-xl">Rp <?= number_format($_SESSION['saldo'] ?? 0, 0, ',', '.'); ?></p>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <h3 class="text-lg font-semibold text-dark">Membership</h3>
                        <p class="text-primary font-bold text-xl"><?= $_SESSION['membership'] ?? 'Regular'; ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-dark mb-6">Cari Destinasi Sesuai Preferensi</h2>
                <form id="recommendation-form" method="POST" action="index.php">
                    <div class="space-y-6">
                        <div>
                            <input type="hidden" name="action" value="rekomendasi">
                            <label class="block text-sm font-medium text-dark mb-2">Budget (Rp)</label>
                            <div class="px-4">
                                <input required type="range" id="budget" name="budget" min="50000" max="10000000" step="50000" value="50000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider">
                                <div class="flex justify-between text-sm text-gray-500 mt-1">
                                    <span>50K</span>
                                    <span id="budget-value" class="font-semibold text-primary">50.000</span>
                                    <span>10M</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark mb-2">Musim</label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-primary active:border-primary transition-colors">
                                    <input required type="radio" name="musim" value="Kemarau" class="sr-only">
                                    <div class="radio-custom mr-3"></div>
                                    <span class="text-dark font-medium">Kemarau</span>
                                </label>
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-primary active:border-primarytransition-colors">
                                    <input required type="radio" name="musim" value="Penghujan" class="sr-only">
                                    <div class="radio-custom mr-3"></div>
                                    <span class="text-dark font-medium">Penghujan</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark mb-2">Jarak Maksimal (km)</label>
                            <div class="px-4">
                                <input required type="range" id="jarak" name="jarak" min="0" max="50" step="5" value="0" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider">
                                <div class="flex justify-between text-sm text-gray-500 mt-1">
                                    <span>0</span>
                                    <span id="jarak-value" class="font-semibold text-primary">0</span>
                                    <span>50</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="jumlah_orang" class="block text-sm font-medium text-dark mb-2">Jumlah Orang</label>
                            <div class="relative">
                                <input type="number" id="jumlah_orang" name="jumlah_orang" min="1" required 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-accent text-dark py-3 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                            Cari Destinasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'include/Footer.php'; ?>
