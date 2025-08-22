<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "recommendest";

//connect databases

// Cek koneksi
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}