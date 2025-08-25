<?php
class DestinasiModel { 
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
        public function getDestinasiById($id){
            $stmt = $this->conn->prepare("SELECT * FROM destinasi WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $querry = $stmt->fetch(PDO::FETCH_ASSOC);

            if($querry){
                return $querry;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }

        // Funtion getAllDestinasi
        public function getListDestinasi(){
            $stmt = $this->conn->prepare("SELECT id, nama, gambar, jarak, harga_tiket FROM destinasi");
            $stmt->execute();
            $querry = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($querry){
                return $querry;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }

        public function getRekomendasiDestinasi($budget, $musim, $jarak, $maksimal_orang){
            $stmt = $this->conn->prepare
            ("SELECT id, nama, gambar, jarak, harga_tiket FROM destinasi 
              WHERE budget_minimal <= :budget_user
              AND musim = :musim
              AND jarak <= :jarak_user
              AND maksimal_orang <= :maksimal_orang_user");
            $stmt->bindParam(':budget_user', $budget);
            $stmt->bindParam(':musim', $musim);
            $stmt->bindParam(':jarak_user', $jarak);
            $stmt->bindParam(':maksimal_orang_user', $maksimal_orang);
            $stmt->execute();
            $querry = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($querry){
                return $querry;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }

        public function getMaksimalOrangById($id){
            $stmt = $this->conn->prepare("SELECT maksimal_orang FROM destinasi where id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $querry = $stmt->fetch(PDO::FETCH_ASSOC);

            if($querry){
                return $querry;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }

        public function getHargaTiketById($id){
            $stmt = $this->conn->prepare("SELECT harga_tiket FROM destinasi where id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $querry = $stmt->fetch(PDO::FETCH_ASSOC);

            if($querry){
                return $querry;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }
}