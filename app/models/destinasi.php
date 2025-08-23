<?php
class destinasi { 
    public PDO $conn;
    public function __construct(PDO $conn){
        $this->conn = $conn;
    }
// Function addDestinasi
    public function addDestinasi($nama,$gambar,$deskripsi,$alamat,$jam_buka,$jarak,$harga_tiket){
        $stmt = $this->conn->prepare("INSERT INTO destinasi (nama, gambar, deskripsi, alamat, jam_buka, jarak, harga_tiket) VALUES (:nama, :gambar, :deskripsi, :alamat, :jam_buka, :jarak, :harga_tiket)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':gambar', $gambar);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':jam_buka', $jam_buka);
        $stmt->bindParam(':jarak', $jarak);
        $stmt->bindParam(':harga_tiket', $harga_tiket);

        if($stmt->execute()){
            echo "Destinasi berhasil ditambahkan.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
// Funtion getDestinasi
        public function getDestinasi($id){
            $stmt = $this->conn->prepare("SELECT * FROM destinasi WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $querry = $stmt->fetch(PDO::FETCH_ASSOC);

            if($querry){
                echo "Nama destinasi: " . $querry['nama'] ."\n";
                echo "Gambar destinasi: " . $querry['gambar'] ."\n";
                echo "Deskripsi destinasi: " . $querry['deskripsi'] ."\n";
                echo "Alamat destinasi: " . $querry['alamat'] ."\n";
                echo "Jam buka destinasi: " . $querry['jam_buka']." WIB" ."\n";
                echo "Jarak destinasi: " . $querry['jarak'] . " km dari Balaikota" ."\n";
                echo "Harga tiket destinasi: " . "Rp.". $querry['harga_tiket'] ."\n";
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }
}