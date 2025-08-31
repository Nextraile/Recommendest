<?php 
include 'include/Navbar.php';
$destinasi_id = $_GET['destinasi_id'] ?? 1;
?>

<main class="min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-dark mb-8">Formulir Booking</h1>
        
        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <?php foreach ($errors as $error): ?>
                    <p><?= $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form method="POST" action="index.php" class="space-y-6">
                <input type="hidden" name="action" value="booking">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?? 1; ?>">
                <input type="hidden" name="destinasi_id" value="<?= $destinasi_id; ?>">
                <input type="hidden" name="membership" value="<?= $_SESSION['membership'] ?? 'Non-Membership'; ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-dark mb-2">Email</label>
                        <input type="email" id="email" name="email" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label for="telp" class="block text-sm font-medium text-dark mb-2">Nomor Telepon</label>
                        <input type="tel" id="telp" name="telp" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal_berangkat" class="block text-sm font-medium text-dark mb-2">Tanggal Berangkat</label>
                        <input type="date" id="tanggal_berangkat" name="tanggal_berangkat" required 
                               min="<?= date('Y-m-d'); ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label for="jumlah_orang" class="block text-sm font-medium text-dark mb-2">Jumlah Orang</label>
                        <input type="number" id="jumlah_orang" name="jumlah_orang" min="1" max="20" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>

                <div>
                    <label for="note" class="block text-sm font-medium text-dark mb-2">Catatan (Opsional)</label>
                    <textarea id="note" name="note" rows="4" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                              placeholder="Tambahkan catatan khusus untuk booking Anda..."></textarea>
                </div>

                <div class="flex gap-4">
                    <button type="button" onclick="history.back()" 
                            class="flex-1 bg-gray-300 text-dark py-3 px-6 rounded-lg font-semibold hover:bg-gray-400 transition-colors">
                        Kembali
                    </button>
                    <button type="submit" 
                            class="flex-1 bg-accent text-dark py-3 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                        Lanjut ke Summary
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'include/Footer.php'; ?>
