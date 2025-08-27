<?php
class UserModel { 
    private $conn;
    public function __construct(){
        $config = new config();
        $this->conn = $config->conn;
    }

    public function addUser($nama, $saldo, $membership){
        $stmt = $this->conn->prepare("INSERT INTO user (nama, saldo, membership) VALUES (:nama, :saldo, :membership)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':saldo', $saldo);
        $stmt->bindParam(':membership', $membership);
        $stmt->execute();
    }

    public function getUserDataById($id){
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $query =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($query){
            return $query;
        }
    }

    public function changeMembership($id, $new_membership){
        $stmt = $this->conn->prepare("UPDATE user SET membership = :membership WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':membership', $new_membership);
        $stmt->execute();
    }

    public function getSaldo($id){
        $stmt = $this->conn->prepare("SELECT saldo FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function updateSaldo($id, $new_saldo){
        $stmt = $this->conn->prepare("UPDATE user SET saldo = :saldo WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':saldo', $new_saldo);
        $stmt->execute();
    }

    public function getMaksimalOrangById($id){
        $stmt = $this->conn->prepare("SELECT maksimal_orang FROM destinasi WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $query = $stmt->fetch(PDO::FETCH_ASSOC);
            return $query;
        }
    }
}
