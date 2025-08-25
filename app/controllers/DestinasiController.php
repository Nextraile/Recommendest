<?php
class DestinasiController{
    private $model;

        public function __construct(){
            $this->model = new DestinasiModel();
        }

        public function getDestinasiData($id){
            return $this->model->getDestinasiById($id);
        }
}