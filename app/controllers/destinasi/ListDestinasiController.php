<?php
class ListDestinasiController{
    private $model;

    public function __construct(){
        $this->model = new DestinasiModel();
    }

    public function index(){
        $list_destinasi = $this->model->getListDestinasi();
        require_once __DIR__ . '/../../views/ListDestinasi.php';
    }
}