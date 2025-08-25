<?php

class RekomendasiController
{
    private $model;

    public function __construct()
    {
        $this->model = new RekomendasiModel();
    }

    public function index()
    {
        $data = $this->model->getAllData();
        require_once __DIR__ . '/../views/rekomendasi/index.php';
    }
}