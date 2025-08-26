<?php
require_once __DIR__ . '/../../app/autoload.php';
class inputDataDestinasi { 
    private $conn;
    public function __construct(){
        $config = new config();
        $this->conn = $config->conn;
    }

    public function run(){
    // Ambil isi JSON (misalnya dari file)
    $jsonData = file_get_contents("data.json");
    // Decode JSON -> array
    $data = json_decode($jsonData, associative: true);
    
    // Looping data
    foreach ($data as $row) {
        $nama = $row['nama'];
        $gambar = $row['gambar'];
        $deskripsi = $row['deskripsi'];
        $alamat = $row['alamat'];
        $jam_buka = $row['jam_buka'];
        $musim = $row['musim'];
        $maksimal_orang = $row['maksimal_orang'];
        $jarak = $row['jarak'];
        $harga_tiket = $row['harga_tiket'];

        $sql = $this->conn->prepare("INSERT INTO destinasi (nama, gambar, deskripsi, alamat, jam_buka, musim, maksimal_orang, jarak, harga_tiket) VALUES (:nama, :gambar, :deskripsi, :alamat, :jam_buka, :musim, :maksimal_orang, :jarak, :harga_tiket)");
        if ($sql->execute([
            ':nama' => $nama,
            ':gambar' => $gambar,
            ':deskripsi' => $deskripsi,
            ':alamat' => $alamat,
            ':jam_buka' => $jam_buka,
            ':musim' => $musim,
            ':maksimal_orang' => $maksimal_orang,
            ':jarak' => $jarak,
            ':harga_tiket' => $harga_tiket
        ])) {
            echo "Data $nama berhasil disimpan\n";
        } else {
            echo "Error: " . $sql->errorInfo()[2] . "\n";
        }
        }
    }
    public function __destruct(){
        // PDO does not require explicit close; connection closes automatically.
    }
}

$obj = new inputDataDestinasi($conn);
$UserNonMembership = new User();
$UserSilver = new UserSilver();
$UserGold = new UserGold();

$obj->run();