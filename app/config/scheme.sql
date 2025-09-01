CREATE TABLE `user` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`nama` VARCHAR(75) NOT NULL,
	`saldo` INTEGER DEFAULT 0 NOT NULL,
	`membership` ENUM('Silver', 'Gold', 'Non-Membership') NOT NULL DEFAULT 'Non-Membership',
	PRIMARY KEY(`id`)
);
CREATE TABLE `destinasi` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`nama` VARCHAR(75) NOT NULL,
	`gambar` VARCHAR(50) NOT NULL,
	`deskripsi` TEXT NOT NULL,
	`alamat` VARCHAR(100) NOT NULL,
	`jam_buka` VARCHAR(15) NOT NULL,
	`musim` ENUM('Penghujan', 'Kemarau') NOT NULL,
	`maksimal_orang` INTEGER NOT NULL,
	`jarak` FLOAT(5,2) NOT NULL,
	`harga_tiket` INTEGER NOT NULL,
	PRIMARY KEY(`id`)
);
CREATE TABLE `booking` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`user_id` INTEGER NOT NULL,
	`destinasi_id` INTEGER NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`telp` VARCHAR(20) NOT NULL,
	`tanggal_booking` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`tanggal_berangkat` DATE NOT NULL,
	`jumlah_orang` INTEGER NOT NULL,
	`note` VARCHAR(100) NULL,
	`diskon` FLOAT(5,2) DEFAULT 0 NOT NULL,
	`cashback` FLOAT(12,3) DEFAULT 0 NOT NULL,
	`total` FLOAT(12,3) DEFAULT 0 NOT NULL,
	PRIMARY KEY(`id`)
);
ALTER TABLE `booking`
ADD FOREIGN KEY(`user_id`) REFERENCES `user`(`id`)
ON UPDATE NO ACTION ON DELETE CASCADE;
ALTER TABLE `booking`
ADD FOREIGN KEY(`destinasi_id`) REFERENCES `destinasi`(`id`)
ON UPDATE NO ACTION ON DELETE CASCADE;