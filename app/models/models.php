<?php
require_once "config.php";

// Class input data
class inputDatabase { 
    public PDO $conn;
    public function __construct(PDO $conn){
        $this->conn = $conn;
    }

// Function input data user
    public function inputUser($nama,$saldo,$membership){
        $stmt = $this->conn->prepare("INSERT INTO user (nama, saldo, membership) VALUES (:nama, :saldo, :membership)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':saldo', $saldo);
        $stmt->bindParam(':membership', $membership);
        
        if($stmt->execute()){
            echo "Data berhasil ditambahkan.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

// Funtion input data booking
    public function inputBooking($user_id,$destinasi_id,$email,$telp,$tanggal_booking,$tanggal_berangkat,$musim,$jumlah_orang,$note,$diskon,$cashback,$total){
        $stmt = $this->conn->prepare("INSERT INTO booking (user_id, destinasi_id, email, telp, tanggal_booking, tanggal_berangkat, musim, jumlah_orang, note, diskon, cashback, total) VALUES (:user_id, :destinasi_id, :email, :telp, :tanggal_booking, :tanggal_berangkat, :musim, :jumlah_orang, :note, :diskon, :cashback, :total)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':destinasi_id', $destinasi_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telp', $telp);
        $stmt->bindParam(':tanggal_booking', $tanggal_booking);
        $stmt->bindParam(':tanggal_berangkat', $tanggal_berangkat);
        $stmt->bindParam(':musim', $musim);
        $stmt->bindParam(':jumlah_orang', $jumlah_orang);
        $stmt->bindParam(':note', $note);
        $stmt->bindParam(':diskon', $diskon);
        $stmt->bindParam(':cashback', $cashback);
        $stmt->bindParam(':total', $total);

        if($stmt->execute()){
            echo "Booking berhasil ditambahkan.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

// Funtion input data destinasi
    public function inputDestinasi($nama,$gambar,$deskripsi,$alamat,$jam_buka,$jarak,$harga_tiket){
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
}

// Class output data
class outputDatabase {
        public PDO $conn;
        public function __construct(PDO $conn){
            $this->conn = $conn;
        }

// Funtion output data user
        public function getUser($id){
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $querry =  $stmt->fetch(PDO::FETCH_ASSOC);

            
            if($stmt->execute()){
                echo "Data berhasil diambil.".
                $querry;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }

// Funtion output data booking
        public function getBooking($id){
            $stmt = $this->conn->prepare("SELECT * FROM booking WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

// Funtion output data destinasi
        public function getDestinasi($id){
            $stmt = $this->conn->prepare("SELECT * FROM destinasi WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
}



$obj = new inputDatabase($conn);
$obj->inputUser("Udin", 100000, "Silver");

$obj = new outputDatabase($conn);
$obj->getUser(5);
