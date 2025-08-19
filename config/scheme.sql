CREATE TABLE `user` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`nama` VARCHAR(75) NOT NULL,
	`saldo` INTEGER DEFAULT 0 NOT NULL,
	`membership` ENUM('silver', 'gold', 'non membership') NOT NULL DEFAULT 'non membership',
	PRIMARY KEY(`id`)
);


CREATE TABLE `destinasi` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`nama` VARCHAR(75) NOT NULL,
	`gambar` VARCHAR(50) NOT NULL,
	`deskripsi` VARCHAR(255) NOT NULL,
	`alamat` VARCHAR(100) NOT NULL,
	`jam_buka` TIME NOT NULL,
	`jarak` INTEGER NOT NULL,
	`harga_tiket` INTEGER NOT NULL,
	PRIMARY KEY(`id`)
);


CREATE TABLE `booking` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`user_id` INTEGER NOT NULL UNIQUE,
	`destinasi_id` INTEGER NOT NULL UNIQUE,
	`email` VARCHAR(100) NOT NULL,
	`telp` INTEGER NOT NULL,
	`tanggal_booking` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`tanggal_berangkat` DATE NOT NULL,
	`musim` ENUM('Penghujan', 'Kemarau') NOT NULL,
	`jumlah_orang` INTEGER NOT NULL,
	`note` VARCHAR(100) NULL,
	`diskon` FLOAT(5,2) DEFAULT 0 NOT NULL,
	`cashback` FLOAT(12,3) DEFAULT 0 NOT NULL,
	`total` FLOAT(12,3) DEFAULT 0 NOT NULL,
	PRIMARY KEY(`id`, `user_id`, `destinasi_id`)
);


ALTER TABLE `user`
ADD FOREIGN KEY(`id`) REFERENCES `booking`(`user_id`)
ON UPDATE NO ACTION ON DELETE CASCADE;
ALTER TABLE `destinasi`
ADD FOREIGN KEY(`id`) REFERENCES `booking`(`destinasi_id`)
ON UPDATE NO ACTION ON DELETE CASCADE;