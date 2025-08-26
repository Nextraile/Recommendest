<?php

class RekomendasiController
{
    private $model;

    public function __construct()
    {
        $this->model = new DestinasiModel();
    }

    public function processForm($formData)
    {
        if ($formData) {
            $budget = $formData['budget'];
            $musim = $formData['musim'];
            $jarak = $formData['jarak'];
            $jumlah_orang = $formData['jumlah_orang'];

            $this->makeRecommendation($budget, $musim, $jarak, $jumlah_orang);
        }
    }

    public function makeRecommendation($budget, $musim, $jarak, $jumlah_orang)
    {
        $recommendations = $this->model->getRekomendasiDestinasi($budget, $musim, $jarak, $jumlah_orang);
        require_once __DIR__ . '/../../views/ListDestinasi.php';
    }
}