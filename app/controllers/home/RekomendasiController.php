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

            $this->makeRecommendation($musim, $jarak, $jumlah_orang);
        }
    }

    public function makeRecommendation($musim, $jarak, $jumlah_orang)
    {
        $recommendations = $this->model->getRekomendasiDestinasi($musim, $jarak, $jumlah_orang);
        require_once __DIR__ . '/../../views/Rekomendasi.php';
    }
}