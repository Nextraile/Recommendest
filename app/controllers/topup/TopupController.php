<?php
class TopupController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function index() {
        require_once __DIR__ . '/../../views/Topup.php';
    }

    public function processForm($formData) {
        if ($formData) {
            $user_id = $formData['id'];
            $jumlah = $formData['jumlah'];

            $this->model->topup($user_id, $jumlah);
            header('Location: index.php');
        }
    }
}