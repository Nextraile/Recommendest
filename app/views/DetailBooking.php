<?php 
include 'include/Navbar.php';

// Sample booking detail data - replace with actual database query
// $booking = [
//     'id' => $_GET['id'] ?? 1,
//     'user_id' => 1,
//     'destinasi_id' => 1,
//     'destinasi_nama' => 'Pantai Kuta',
//     'email' => 'user@example.com',
//     'telp' => '081234567890',
//     'tanggal_booking' => '2024-01-05 14:30:00',
//     'tanggal_berangkat' => '2024-02-15',
//     'jumlah_orang' => 2,
//     'note' => 'Honeymoon trip',
//     'diskon' => 10,
//     'cashback' => 5000,
//     'total' => 95000
// ];
?>

<main class="min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8"> 
        <button onclick="history.back()" class="flex items-center text-primary hover:text-accent mb-6 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali
        </button>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-dark mb-2">Detail Booking</h1>
                    <p class="text-gray-600">Booking ID: #<?= str_pad($booking['id'], 6, '0', STR_PAD_LEFT); ?></p>
                </div>
                <div class="text-right">
                    <span class="bg-accent text-dark px-3 py-1 rounded-full text-sm font-semibold">Confirmed</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h2 class="text-xl font-semibold text-dark mb-4">Informasi Booking</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Destinasi:</span>
                            <span class="font-semibold"><?= $booking['destinasi_nama']; ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Tanggal Booking:</span>
                            <span class="font-semibold"><?= date('d F Y H:i', strtotime($booking['tanggal_booking'])); ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Tanggal Berangkat:</span>
                            <span class="font-semibold"><?= date('d F Y', strtotime($booking['tanggal_berangkat'])); ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Jumlah Orang:</span>
                            <span class="font-semibold"><?= $booking['jumlah_orang']; ?> orang</span>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-dark mb-4">Informasi Kontak</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Email:</span>
                            <span class="font-semibold"><?= $booking['email']; ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Telepon:</span>
                            <span class="font-semibold"><?= $booking['telp']; ?></span>
                        </div>
                        <?php if (!empty($booking['note'])): ?>
                        <div class="py-2 border-b border-gray-200">
                            <span class="text-gray-600 block mb-1">Catatan:</span>
                            <span class="font-semibold"><?= $booking['note']; ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg mb-8">
                <div class="space-y-2">
                    <div class="flex justify-between">
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between text-lg font-bold text-dark">
                        <span>Total Dibayar</span>
                        <span>Rp <?= number_format($booking['total'], 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <form class="flex gap-4" method="POST" action="index.php?route=riwayat-booking" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan booking ini?');">
                <input type="hidden" name="action" value="delete_booking">
                <input type="hidden" name="id" value="<?= $booking['id']; ?>">
                <button type="submit" 
                class="flex-1 bg-red-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-red-600 transition-colors">
                Batalkan Booking
                </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'include/Footer.php'; ?>
