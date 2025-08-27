<?php
class HomeController{

    private $data = [];
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index($id)
    {
        $this->getUserDataById($id);
        $user_data = $this->data;
        require_once __DIR__ . '/../../views/homepage.php';
    }

    public function getUserDataById($id)
    {
        $this->data = $this->model->getUserDataById($id);
        $id = $this->data['id'] = $_SESSION['user_id'];
        $nama = $this->data['nama'] = $_SESSION['nama'];
        $saldo = $this->data['saldo'] = $_SESSION['saldo'];
        $membership = $this->data['membership'] = $_SESSION['membership'];
    }

}