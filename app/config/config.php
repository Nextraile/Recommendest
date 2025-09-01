<?php

class config {
    private $host       = "localhost",
            $user       = "root",
            $password   = "LuRidwan85!",
            $database   = "recommendest";
    public  $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn = null;
        }
    }
}