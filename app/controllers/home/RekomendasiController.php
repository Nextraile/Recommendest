<?php

class RekomendasiController
{
    private $model_destinasi;
    private $model_user;
    private $budget;
    private $musim;
    private $jarak;
    private $jumlah_orang;

    public function __construct()
    {
        $this->model_rekomendasi = new DestinasiModel();
        $this->model_user = new UserModel();
    }

    public function index()
    {
        $data = $this->model_user->getAllData();
        require_once __DIR__ . '/../views/rekomendasi/index.php';
    }
}