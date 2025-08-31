<?php 
include 'include/Navbar.php';

// // Sample bookings data - replace with actual database query
// $bookings = [
//     [
//         'id' => 1,
//         'destinasi' => 'Pantai Kuta',
//         'tanggal_berangkat' => '2024-02-15',
//         'jumlah_orang' => 2,
//         'total' => 95000,
//         'note' => 'Honeymoon trip'
//     ],
//     [
//         'id' => 2,
//         'destinasi' => 'Gunung Bromo',
//         'tanggal_berangkat' => '2024-01-20',
//         'jumlah_orang' => 4,
//         'total' => 180000,
//         'note' => 'Family vacation'
//     ],
//     [
//         'id' => 3,
//         'destinasi' => 'Candi Borobudur',
//         'tanggal_berangkat' => '2024-01-10',
//         'jumlah_orang' => 1,
//         'total' => 75000,
//         'note' => ''
//     ]
// ];
?>

<main class="min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-dark mb-8">Riwayat Transaksi</h1>
        
        <?php if (empty($bookings)): ?>
            <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                <div class="text-gray-400 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Transaksi</h2>
                <p class="text-gray-500 mb-6">Anda belum memiliki riwayat booking. Mulai jelajahi destinasi wisata sekarang!</p>
                <a href="index.php?route=list" class="bg-accent text-dark py-2 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                    Mulai Booking
                </a>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($bookings as $booking): ?>
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex-1 mb-4 md:mb-0">
                                <h3 class="text-xl font-semibold text-dark mb-2"><?= $booking['destinasi']; ?></h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                                    <div>
                                        <span class="font-medium">Tanggal:</span>
                                        <span><?= date('d F Y', strtotime($booking['tanggal_berangkat'])); ?></span>
                                    </div>
                                    <div>
                                        <span class="font-medium">Jumlah:</span>
                                        <span><?= $booking['jumlah_orang']; ?> orang</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">Total:</span>
                                        <span class="text-accent font-semibold">Rp <?= number_format($booking['total'], 0, ',', '.'); ?></span>
                                    </div>
                                </div>
                                <?php if (!empty($booking['note'])): ?>
                                    <p class="text-sm text-gray-500 mt-2">
                                        <span class="font-medium">Catatan:</span> <?= $booking['note']; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="flex gap-2">
                                <button onclick="window.location.href='index.php?route=detail-booking&booking_id=<?= $booking['destinasi_id']; ?>'" 
                                        class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-opacity-90 transition-colors">
                                    Detail
                                </button>
                                <button onclick="cancelBooking(<?= $booking['id']; ?>)" 
                                        class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition-colors">
                                    Batalkan
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'include/Footer.php'; ?>
