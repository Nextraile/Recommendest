<?php
class ListDestinasiController{
    private $model;

    public function __construct(){
        $this->model = new DestinasiModel();
    }

    public function index(){
        $destinasi = $this->model->getListDestinasi();
        require_once __DIR__ . '/../../views/ListDestinasi.php';
    }
}