<?php
class HomeController{

    private $data;
    private $model;

    public function __construct($id)
    {
        $this->model = new UserModel();
        $this->data = $this->model->getUserById($id);
    }

    public function index()
    {
        $id = $this->data['id'] = $_SESSION['user_id'];
        $nama = $this->data['nama'] = $_SESSION['nama'];
        $saldo = $this->data['saldo'] = $_SESSION['saldo'];
        $membership = $this->data['membership'] = $_SESSION['membership'];

        require_once __DIR__ . '/../views/homepage.php';
    }

}