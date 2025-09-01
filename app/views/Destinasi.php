<?php 
include 'include/Navbar.php';

// Sample destination data - replace with actual database query
// $destinasi = [
//     'id' => $_GET['id'] ?? 1,
//     'nama' => 'Pantai Kuta',
//     'gambar' => '/public/assets/images/kuta.png',
//     'deskripsi' => 'Pantai Kuta adalah salah satu pantai terindah di Bali dengan pasir putih yang lembut dan ombak yang sempurna untuk berselancar. Tempat ini menawarkan pemandangan matahari terbenam yang spektakuler.',
//     'alamat' => 'Kuta, Badung, Bali',
//     'jam_buka' => '24 Jam',
//     'jarak' => 15,
//     'harga_tiket' => 25000
// ];
?>

<main class="min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <button onclick="history.back()" class="flex items-center text-primary hover:text-accent mb-6 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali
        </button>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="relative h-96">
                <img src="<?= BASE_URL ?>/assets/images/<?= $destinasi['gambar']; ?>"" alt="<?= $destinasi['nama']; ?>" 
                     class="w-full h-full object-cover"
                     onerror="this.src='/placeholder.svg?height=384&width=800';">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                    <div class="p-8">
                        <h1 class="text-4xl font-bold text-white mb-2"><?= $destinasi['nama']; ?></h1>
                        <p class="text-white text-lg opacity-90"><?= $destinasi['alamat']; ?></p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2">
                        <h2 class="text-2xl font-bold text-dark mb-4">Deskripsi</h2>
                        <p class="text-gray-700 leading-relaxed mb-6"><?= $destinasi['deskripsi']; ?></p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-dark mb-2">Jam Operasional</h3>
                                <p class="text-gray-700"><?= $destinasi['jam_buka']; ?></p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-dark mb-2">Jarak dari Balai Kota</h3>
                                <p class="text-gray-700"><?= $destinasi['jarak']; ?> km</p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <div class="bg-primary text-white p-6 rounded-lg sticky top-24">
                            <h3 class="text-xl font-bold mb-4">Informasi Tiket</h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span>Harga Tiket:</span>
                                    <span class="font-bold text-accent">Rp <?= number_format($destinasi['harga_tiket'], 0, ',', '.'); ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Jarak:</span>
                                    <span><?= $destinasi['jarak']; ?> km</span>
                                </div>
                            </div>
                            <button onclick="window.location.href='index.php?route=booking&destinasi_id=<?= $destinasi['id']; ?>'" 
                                    class="w-full bg-accent text-dark py-3 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                                Booking Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'include/Footer.php'; ?>
