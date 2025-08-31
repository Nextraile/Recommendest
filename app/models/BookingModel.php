<?php
class BookingModel{ 
    private $conn;
    public function __construct(){
        $config = new config();
        $this->conn = $config->conn;
    }
// Function addBooking
    public function addBooking($user_id,$destinasi_id,$email,$telp,$tanggal_berangkat,$jumlah_orang,$note,$diskon,$cashback,$total){
        $stmt = $this->conn->prepare("INSERT INTO booking (user_id, destinasi_id, email, telp, tanggal_berangkat, jumlah_orang, note, diskon, cashback, total) VALUES (:user_id, :destinasi_id, :email, :telp, :tanggal_berangkat, :jumlah_orang, :note, :diskon, :cashback, :total)");
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
        $stmt->execute();
    }

    public function deleteBooking($id){
        $stmt = $this->conn->prepare("DELETE FROM booking WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            header('Location: index.php?route=riwayat-booking');
        }
    }

// Function getBooking
    public function getDetailsBooking($id){
        $stmt = $this->conn->prepare("SELECT destinasi.nama AS destinasi_nama, booking.* FROM booking INNER JOIN destinasi ON booking.destinasi_id = destinasi.id WHERE booking.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUserBookings($user_id){
        $stmt = $this->conn->prepare("SELECT booking.id         AS id,
                                            destinasi.id             AS destinasi_id,
                                            destinasi.nama             AS destinasi_nama,
                                            booking.tanggal_berangkat  AS tanggal_berangkat,
                                            booking.jumlah_orang       AS jumlah_orang,
                                            booking.total              AS total,
                                            booking.note               AS note
                                            FROM booking
                                            INNER JOIN destinasi
                                            ON booking.destinasi_id = destinasi.id
                                            WHERE booking.user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}