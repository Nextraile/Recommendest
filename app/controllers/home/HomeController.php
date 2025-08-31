<?php
class HomeController{

    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index($id)
    {
        $user_data = $this->model->getUserDataById($id);

        foreach ($user_data as $key => $value) {
            $_SESSION[$key] = $value;
        }

        $user_data['id'] = $_SESSION['user_id'];
        $user_data['nama'] = $_SESSION['nama'];
        $user_data['saldo'] = $_SESSION['saldo'];
        $user_data['membership'] = $_SESSION['membership'];

        require_once __DIR__ . '/../../views/Home.php';
    }
}