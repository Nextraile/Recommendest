<?php include 'include/Navbar.php'; ?>

<main class="min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-dark mb-8">List Destinasi Wisata</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($list_destinasi as $destinasi): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="cursor-pointer" onclick="window.location.href='index.php?route=destinasi&destinasi_id=<?= $destinasi['id']; ?>'">
                        <img src="<?= BASE_URL ?>/assets/images/<?= $destinasi['gambar']; ?>" alt="<?= $destinasi['nama']; ?>" 
                             class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300"
                             onerror="this.src='/placeholder.svg?height=192&width=300&name=<?= urlencode($destinasi['nama']); ?>'">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-dark mb-2"><?= $destinasi['nama']; ?></h3>
                        <div class="flex justify-between items-center text-sm text-gray-600 mb-3">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                <?= $destinasi['jarak']; ?> km
                            </span>
                            <span class="font-semibold text-accent">Rp <?= number_format($destinasi['harga_tiket'], 0, ',', '.'); ?></span>
                        </div>
                        <button onclick="window.location.href='index.php?route=destinasi&destinasi_id=<?= $destinasi['id']; ?>'" 
                                class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition-colors">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php include 'include/Footer.php'; ?>