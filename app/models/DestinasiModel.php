<?php
class DestinasiModel { 
    private $conn;
    public function __construct(){
        $config = new config();
        $this->conn = $config->conn;
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
        $stmt->execute();
    }
// Funtion getDestinasi
    public function getDestinasiById($id){
        $stmt = $this->conn->prepare("SELECT * FROM destinasi WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Funtion getAllDestinasi
    public function getListDestinasi(){
        $stmt = $this->conn->prepare("SELECT id, nama, gambar, jarak, harga_tiket FROM destinasi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRekomendasiDestinasi( $musim, $jarak, $maksimal_orang){
        $stmt = $this->conn->prepare
        ("SELECT id, nama, gambar, jarak, harga_tiket FROM destinasi 
            WHERE musim = :musim
            AND jarak <= :jarak_user
            AND maksimal_orang <= :maksimal_orang_user");
        // $stmt->bindParam(':budget_user', $budget);
        $stmt->bindParam(':musim', $musim);
        $stmt->bindParam(':jarak_user', $jarak);
        $stmt->bindParam(':maksimal_orang_user', $maksimal_orang);
        $stmt->execute();
        $recommendations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($recommendations)) {
            return $recommendations = [];
        }
        return $recommendations;
    }

    public function getMaksimalOrangById($id){
        $stmt = $this->conn->prepare("SELECT maksimal_orang FROM destinasi where id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getHargaTiketById($id): int{
        $stmt = $this->conn->prepare("SELECT harga_tiket FROM destinasi where id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    public function getNamaById($id): string{
        $stmt = $this->conn->prepare("SELECT nama FROM destinasi where id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return (string) $stmt->fetchColumn();
    }
}