<?php include 'include/Navbar.php'; ?>

<main class="min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

<?php
    // $recommendations = [
    //     // Sample data
    //     [
    //         'id' => 1,
    //         'nama' => 'Kelenteng Sam Poo Kong',
    //         'gambar' => 'kelenteng_sam_poo_kong.jpg',
    //         'jarak' => 2.8,
    //         'harga_tiket' => 10000
    //     ],
    //     [
    //         'id' => 2,
    //         'nama' => 'Lawang Sewu',
    //         'gambar' => 'lawang_sewu.png',
    //         'jarak' => 0.35,
    //         'harga_tiket' => 20000
    //     ],
    //     [
    //         'id' => 3,
    //         'nama' => 'Pantai Marina',
    //         'gambar' => 'pantai_marina.jpg',
    //         'jarak' => 6.6,
    //         'harga_tiket' => 40000
    //     ]
    // ];
?>

    <?php if (!empty($recommendations)): ?>
        <h1 class="text-3xl font-bold text-dark mb-8">List Rekomendasi Destinasi Wisata</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($recommendations as $destinasi): ?>
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

        <?php else: ?>
                <div class="col-span-full">
                    <div class="text-center py-16">
                        <div class="mb-6">
                            <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.562M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.636 6.636a9 9 0 000 12.728"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-dark mb-4">Tidak Ada Destinasi yang Cocok</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            Maaf, tidak ada destinasi yang sesuai dengan kriteria pencarian Anda. 
                            Coba ubah filter atau jelajahi semua destinasi yang tersedia.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button onclick="window.location.href='index.php?route=list'" 
                                    class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors">
                                Lihat Semua Destinasi
                            </button>
                            <button onclick="window.location.href='index.php?route=home'" 
                                    class="bg-white text-primary border-2 border-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition-colors">
                                Kembali ke Beranda
                            </button>
                        </div>
                    </div>
                </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'include/Footer.php'; ?>
