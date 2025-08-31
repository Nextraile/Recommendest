<?php 
include 'include/Navbar.php';

// // Sample booking data - replace with actual form processing
// $booking = [
//     'user_id' => $_POST['user_id'] ?? $_SESSION['user_id'] ?? 1,
//     'destinasi_id' => $_POST['destinasi_id'] ?? 1,
//     'email' => $_POST['email'] ?? 'user@example.com',
//     'telp' => $_POST['telp'] ?? '081234567890',
//     'tanggal_berangkat' => $_POST['tanggal_berangkat'] ?? date('Y-m-d', strtotime('+7 days')),
//     'jumlah_orang' => $_POST['jumlah_orang'] ?? 2,
//     'note' => $_POST['note'] ?? '',
//     'diskon' => 10, // percentage
//     'cashback' => 5000,
//     'total' => 95000 // calculated based on ticket price, discount, etc.
// ];

// // Sample destination data
// $destinasi = [
//     'nama' => 'Pantai Kuta',
//     'harga_tiket' => 25000
// ];
?>

<main class="min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-dark mb-8">Summary Booking</h1>
        
        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <?php foreach ($errors as $error): ?>
                    <p><?= $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-semibold text-dark mb-6">Detail Booking</h2>
            
            <div class="space-y-4 mb-8">
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Destinasi:</span>
                    <span class="font-semibold"><?= $booking['destinasi_nama']; ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Email:</span>
                    <span class="font-semibold"><?= $booking['email']; ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Telepon:</span>
                    <span class="font-semibold"><?= $booking['telp']; ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Tanggal Berangkat:</span>
                    <span class="font-semibold"><?= date('d F Y', strtotime($booking['tanggal_berangkat'])); ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Jumlah Orang:</span>
                    <span class="font-semibold"><?= $booking['jumlah_orang']; ?> orang</span>
                </div>
                <?php if (!empty($booking['note'])): ?>
                <div class="flex justify-between py-2 border-b border-gray-200">
                    <span class="text-gray-600">Catatan:</span>
                    <span class="font-semibold"><?= $booking['note']; ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg mb-8">
                <h3 class="text-lg font-semibold text-dark mb-4">Rincian Harga</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Harga Tiket (<?= $booking['jumlah_orang']; ?> orang)</span>
                        <span>Rp <?= number_format($booking['harga_tiket'] * $booking['jumlah_orang'], 0, ',', '.'); ?></span>
                    </div>
                    <div class="flex justify-between text-accent">
                        <span>Diskon (<?= $booking['diskon']; ?>%)</span>
                        <span>-Rp <?= number_format(($booking['harga_tiket'] * $booking['jumlah_orang'] * $booking['diskon']) / 100, 0, ',', '.'); ?></span>
                    </div>
                    <div class="flex justify-between text-accent">
                        <span>Cashback</span>
                        <span>-Rp <?= number_format($booking['cashback'], 0, ',', '.'); ?></span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between text-lg font-bold text-dark">
                        <span>Total Pembayaran</span>
                        <span>Rp <?= number_format($booking['total'], 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>

            <form method="POST" action="index.php">
                <input type="hidden" name="action" value="create_booking">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">
                <input type="hidden" name="destinasi_id" value="<?= $destinasi_id; ?>">
                <input type="hidden" name="email" value="<?= $email; ?>">
                <input type="hidden" name="telp" value="<?= $telp; ?>">
                <input type="hidden" name="tanggal_berangkat" value="<?= $tanggal_berangkat; ?>">
                <input type="hidden" name="jumlah_orang" value="<?= $jumlah_orang; ?>">
                <input type="hidden" name="note" value="<?= $note; ?>">
                <input type="hidden" name="diskon" value="<?= $diskon; ?>">
                <input type="hidden" name="cashback" value="<?= $cashback; ?>">
                <input type="hidden" name="total" value="<?= $total; ?>">
                
                <div class="flex gap-4">
                    <button type="button" onclick="history.back()" 
                            class="flex-1 bg-gray-300 text-dark py-3 px-6 rounded-lg font-semibold hover:bg-gray-400 transition-colors">
                        Kembali
                    </button>
                    <button type="submit" 
                            class="flex-1 bg-accent text-dark py-3 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                        Bayar Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'include/Footer.php'; ?>
