<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "recommendest";

// Inisialisasi koneksi database menggunakan PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}