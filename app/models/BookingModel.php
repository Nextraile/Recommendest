<?php
class BookingModel{ 
    private $conn;
    public function __construct(){
        $config = new config();
        $this->conn = $config->conn;
    }
// Function addBooking
    public function addBooking($user_id,$destinasi_id,$email,$telp,$tanggal_berangkat,$jumlah_orang,$note,$diskon,$cashback,$total){
        $stmt = $this->conn->prepare("INSERT INTO booking (user_id, destinasi_id, email, telp, tanggal_booking, tanggal_berangkat, musim, jumlah_orang, note, diskon, cashback, total) VALUES (:user_id, :destinasi_id, :email, :telp, :tanggal_booking, :tanggal_berangkat, :musim, :jumlah_orang, :note, :diskon, :cashback, :total)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':destinasi_id', $destinasi_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telp', $telp);
        $stmt->bindParam(':tanggal_berangkat', $tanggal_berangkat);
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

    public function deleteBooking($id){
        $stmt = $this->conn->prepare("DELETE FROM booking WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return $notif = "Booking berhasil dihapus!";
        } else {
            return "Error: " . $stmt->errorInfo()[2];
        }
    }

// Function getBooking
    public function getDetailsBooking($id){
        $stmt = $this->conn->prepare("SELECT * FROM booking WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $query = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($query){
            return $query;
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

    public function getAllUserBookings($user_id){
        $stmt = $this->conn->prepare("SELECT id, email, telp, tanggal_berangkat, jumlah_orang, note FROM booking WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $query = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($query){
            return $query;
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}