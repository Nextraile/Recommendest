<?php include 'include/Navbar.php'; ?>

<main class="min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-dark mb-8">List Destinasi Wisata</h1>
        
        <?php if (isset($_POST['budget']) || isset($_POST['musim']) || isset($_POST['jarak'])): ?>
            <div class="bg-primary text-white p-4 rounded-lg mb-8">
                <h2 class="font-semibold mb-2">Filter Pencarian:</h2>
                <div class="flex flex-wrap gap-4 text-sm">
                    <?php if (isset($_POST['budget'])): ?>
                        <span>Budget: Rp <?php echo number_format($_POST['budget'], 0, ',', '.'); ?></span>
                    <?php endif; ?>
                    <?php if (isset($_POST['musim'])): ?>
                        <span>Musim: <?php echo $_POST['musim']; ?></span>
                    <?php endif; ?>
                    <?php if (isset($_POST['jarak'])): ?>
                        <span>Jarak: <?php echo $_POST['jarak']; ?> km</span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php 
            // // Sample destinations data - replace with actual database query
            // $destinasi_list = [
            //     ['id' => 1, 'nama' => 'Pantai Kuta', 'gambar' => '/public/assets/images/kuta.png', 'jarak' => 15, 'harga_tiket' => 25000],
            //     ['id' => 2, 'nama' => 'Gunung Bromo', 'gambar' => '/public/assets/images/bromo.png', 'jarak' => 45, 'harga_tiket' => 50000],
            //     ['id' => 3, 'nama' => 'Candi Borobudur', 'gambar' => '/public/assets/images/borobudur.png', 'jarak' => 30, 'harga_tiket' => 75000],
            //     ['id' => 4, 'nama' => 'Danau Toba', 'gambar' => '/public/assets/images/toba.png', 'jarak' => 25, 'harga_tiket' => 35000],
            //     ['id' => 5, 'nama' => 'Raja Ampat', 'gambar' => '/public/assets/images/raja-ampat.png', 'jarak' => 50, 'harga_tiket' => 100000],
            //     ['id' => 6, 'nama' => 'Kawah Ijen', 'gambar' => '/public/assets/images/ijen.png', 'jarak' => 40, 'harga_tiket' => 45000],
            // ];

            foreach ($list_destinasi as $destinasi): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="cursor-pointer" onclick="window.location.href='index.php?route=destinasi&destinasi_id=<?php echo $destinasi['id']; ?>'">
                        <img src="<?= BASE_URL ?>/assets/images/<?php echo $destinasi['gambar']; ?>" alt="<?php echo $destinasi['nama']; ?>" 
                             class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300"
                             onerror="this.src='/placeholder.svg?height=192&width=300&name=<?php echo urlencode($destinasi['nama']); ?>'">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-dark mb-2"><?php echo $destinasi['nama']; ?></h3>
                        <div class="flex justify-between items-center text-sm text-gray-600 mb-3">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                <?php echo $destinasi['jarak']; ?> km
                            </span>
                            <span class="font-semibold text-accent">Rp <?php echo number_format($destinasi['harga_tiket'], 0, ',', '.'); ?></span>
                        </div>
                        <button onclick="window.location.href='index.php?route=destinasi&destinasi_id=<?php echo $destinasi['id']; ?>'" 
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
