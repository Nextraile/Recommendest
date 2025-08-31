<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#05614B',
                        'dark': '#020E0E',
                        'accent': '#01DE82'
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/style.css">
</head>
<body class="bg-gray-50 text-dark">
    <nav class="bg-primary shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-white text-xl font-bold"><a href="index.php?route=home">Recommendest</a></h1>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="index.php?route=list" class="text-white hover:text-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">List Destinasi</a>
                        <a href="index.php?route=riwayat-booking" class="text-white hover:text-accent px-3 py-2 rounded-md text-sm font-medium transition-colors">Riwayat Booking</a>
                        <a href="index.php?route=topup" class="bg-accent text-dark px-4 py-2 rounded-md text-sm font-medium hover:bg-opacity-90 transition-colors">Top Up</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white hover:text-accent">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-primary">
                <a href="index.php?route=home" class="text-white hover:text-accent block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                <a href="index.php?route=list-destinasi" class="text-white hover:text-accent block px-3 py-2 rounded-md text-base font-medium">List Destinasi</a>
                <a href="index.php?route=riwayat-transaksi" class="text-white hover:text-accent block px-3 py-2 rounded-md text-base font-medium">Riwayat Transaksi</a>
                <a href="index.php?route=topup" class="text-white hover:text-accent block px-3 py-2 rounded-md text-base font-medium">Top Up</a>
            </div>
        </div>
    </nav>
