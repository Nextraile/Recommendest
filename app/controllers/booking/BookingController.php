<?php
class BookingController {
    private $model,
            $destinasi_model,
            $user_model,
            $user_controller;

    public function __construct(){
        $this->model = new BookingModel();
        $this->destinasi_model = new DestinasiModel();
        $this->user_model = new UserModel();
        $this->user_controller = new User();
    }

    public function index(){
        require_once __DIR__ . '/../../views/Booking.php';
    }

    public function validasi($rawData){

        $errors = [];

        $email = $rawData['email'];
        $telp = $rawData['telp'];
        $tanggal_berangkat = $rawData['tanggal_berangkat'];
        $jumlah_orang = $rawData['jumlah_orang'];
        $note = $rawData['note'];

        // validate input
        if (empty($email) || empty($telp)){
            $errors = "email dan telepon wajib diisi";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors = "Email tidak valid";
        } else if (!preg_match('/^[0-9]{10,15}$/', $telp)) {
            $errors = "Nomor telepon tidak valid";
        } else if ($tanggal_berangkat < $tanggal_booking) {
            $errors = "Tanggal berangkat tidak boleh sebelum tanggal booking";
        } else if ($jumlah_orang <= 0) {
            $errors = "Jumlah orang harus lebih dari 0";
        }

        // set booking and departure date
        $tanggal_booking    = date('Y-m-d H:i:s');
        $tanggal_berangkat  = $_POST['tanggal_berangkat'] ?? null;
        $today = new DateTime('today');
        $berangkat = new DateTime($tanggal_berangkat);

        // validate departure date
        if ($berangkat <= $today) {
            $errors = "Tanggal keberangkatan harus lebih dari hari ini";
        }

        // validate maximum capacity
        $maksimal_orang = $this->model->getMaksimalOrangById($destinasi_id);
        if ($jumlah_orang > $maksimal_orang) {
            $errors = "Jumlah orang melebihi kapasitas maksimal destinasi";
        }

        return $errors;
    }

    public function processForm($formData)
    {
        $errors = $this->validasi($formData);
        if (!empty($errors)) {
            return;
        }

        $booking = $this->summary($formData);
        require_once __DIR__ . '/../../views/Summary.php';
    }

    public function summary($formData)
    {
        $user_id = $formData['user_id'];
        $destinasi_id = $formData['destinasi_id'];
        $email = $formData['email'];
        $telp = $formData['telp'];
        $membership = $formData['membership'];
        $tanggal_berangkat = $formData['tanggal_berangkat'];
        $jumlah_orang = $formData['jumlah_orang'];
        $note = $formData['note'];

        $harga_tiket_per_orang = $this->destinasi_model->getHargaTiketById($destinasi_id);

        if ($membership == "Silver") {
            $persentase_diskon = 10;
            $persentase_cashback = 5;
        } else if ($membership == "Gold") {
            $persentase_diskon = 15;
            $persentase_cashback = 10;
        } else {
            $persentase_diskon = 0;
            $persentase_cashback = 0;
        }

        $diskon = $persentase_diskon / 100;
        $cashback = $persentase_cashback / 100;

        $subtotal = ($harga_tiket_per_orang * $jumlah_orang) * (1 - $diskon);
        $nominal_cashback = $subtotal * $cashback;
        $total = $subtotal - $nominal_cashback;

        return $booking = [
            'user_id' => $user_id,
            'destinasi_id' => $destinasi_id,
            'email' => $email,
            'telp' => $telp,
            'tanggal_berangkat' => $tanggal_berangkat,
            'jumlah_orang' => $jumlah_orang,
            'note' => $note,
            'diskon' => $diskon * 100,
            'cashback' => $nominal_cashback,
            'total' => $total
        ];
    }

    public function createBooking($formData)
    {
        $user_id = $formData['user_id'];
        $destinasi_id = $formData['destinasi_id'];
        $email = $formData['email'];
        $telp = $formData['telp'];
        $tanggal_berangkat = $formData['tanggal_berangkat'];
        $jumlah_orang = $formData['jumlah_orang'];
        $note = $formData['note'];
        $diskon = $formData['diskon'];
        $cashback = $formData['cashback'];
        $total = $formData['total'];

        $saldo = $this->user_model->getSaldo($user_id);
        if ($saldo < $total) {
            return $errors = "Saldo tidak mencukupi";
        }
        $this->user_controller->kurangiSaldo($user_id, $total);

        $this->model->addBooking($user_id, $destinasi_id, $email, $telp,
                                 $tanggal_berangkat, $jumlah_orang,
                                 $note, $diskon, $cashback, $total);
        
        header('Location: index.php?route=riwayat-booking');
    }

    public function getBooking($id){
        return $this->model->getDetailsBooking($id);
    }

    public function deleteBooking($id){
        return $this->model->deleteBooking($id);
    }
}
