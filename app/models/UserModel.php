<?php
class UserModel { 
    public PDO $conn;
    public function __construct(PDO $conn){
        $this->conn = $conn;
    }

    public function addUser($nama, $saldo, $membership){
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

    public function getUserById($id){
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $querry =  $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        if($querry){
            return $querry;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }

    public function changeMembership($id, $new_membership){
        $stmt = $this->conn->prepare("UPDATE user SET membership = :membership WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':membership', $new_membership);
        if($stmt->execute()){
            return $str = "Membership berhasil diubah.";
        } else {
            return "Error: " . $stmt->errorInfo()[2];
        }
    }

    public function getSaldo($id){
        $stmt = $this->conn->prepare("SELECT saldo FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function updateSaldo($id, $new_saldo){
        $stmt = $this->conn->prepare("UPDATE user SET saldo = :saldo WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':saldo', $new_saldo);
        if($stmt->execute()){
            return "Saldo berhasil diubah.";
        } else {
            return "Error: " . $stmt->errorInfo()[2];
        }
    }
}