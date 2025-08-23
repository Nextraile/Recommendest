<?php
class user { 
    public PDO $conn;
    public function __construct(PDO $conn){
        $this->conn = $conn;
    }
// Function addUser
    public function addUser($nama,$saldo,$membership){
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
// Funtion getUser
        public function getUser($id){
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $querry =  $stmt->fetch(PDO::FETCH_ASSOC);

            
            if($querry){
                echo "Data berhasil diambil.\n";
                echo "ID: " . $querry['id'] . "\n";
                echo "Nama: " . $querry['nama'] . "\n";
                echo "Saldo: " . $querry['saldo'] . "\n";
                echo "Membership: " . $querry['membership'] . "\n";
                } else {
                    echo "Error: " . $stmt->errorInfo()[2];
                }
            }
        }
