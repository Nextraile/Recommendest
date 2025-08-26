<?php
class DestinasiController{
    private $model;

        public function __construct(){
            $this->model = new DestinasiModel();
        }

        public function getDestinasiData($id){
            $destinasi = $this->model->getDestinasiById($id);
            require_once __DIR__ . '/../../views/Destinasi.php';
        }
}