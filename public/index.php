<?php
require_once __DIR__ . '/../app/autoload.php';



$user = new user($conn);
echo $user->getUser(1);

// `nama` VARCHAR(75) NOT NULL,
// 	`gambar` VARCHAR(50) NOT NULL,
// 	`deskripsi` VARCHAR(255) NOT NULL,
// 	`alamat` VARCHAR(100) NOT NULL,
// 	`jam_buka` TIME NOT NULL,
// 	`jarak` FLOAT(5,2) NOT NULL,
// 	`harga_tiket` INTEGER NOT NULL,

$destinasi = new destinasi($conn);
// $destinasi->addDestinasi(

// );
echo $destinasi->getDestinasi(2);
