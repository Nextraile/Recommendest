<?php include 'include/Navbar.php'; ?>

<main class="min-h-screen py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-dark mb-8 text-center">Top Up Saldo</h1>
            
            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php" class="space-y-6">
                <div>
                    <input type="hidden" name="action" value="topup">
                    <input type="hidden" name="id" value="<?= $_SESSION['user_id']; ?>">
                    <label for="jumlah" class="block text-sm font-medium text-dark mb-2">Jumlah Top Up</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                        <input type="number" id="jumlah" name="jumlah" min="10000" step="1000" required 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Minimum top up Rp 10.000</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <button type="button" onclick="setAmount(50000)" class="amount-btn bg-gray-100 hover:bg-primary hover:text-white py-2 px-4 rounded-lg text-sm font-medium transition-colors">
                        50K
                    </button>
                    <button type="button" onclick="setAmount(100000)" class="amount-btn bg-gray-100 hover:bg-primary hover:text-white py-2 px-4 rounded-lg text-sm font-medium transition-colors">
                        100K
                    </button>
                    <button type="button" onclick="setAmount(250000)" class="amount-btn bg-gray-100 hover:bg-primary hover:text-white py-2 px-4 rounded-lg text-sm font-medium transition-colors">
                        250K
                    </button>
                    <button type="button" onclick="setAmount(500000)" class="amount-btn bg-gray-100 hover:bg-primary hover:text-white py-2 px-4 rounded-lg text-sm font-medium transition-colors">
                        500K
                    </button>
                </div>

                <button type="submit" class="w-full bg-accent text-dark py-3 px-6 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                    Top Up Sekarang
                </button>
            </form>
        </div>
    </div>
</main>

<?php include 'include/Footer.php'; ?>
