<?php
class TopupController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function index() {
        require_once __DIR__ . '/../../views/Topup.php';
    }

    public function processForm($id, $jumlah) {
        $this->model->topup($id, $jumlah);
    }
}