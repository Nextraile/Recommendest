<?php
class BookingController {
    private $model;

    public function __construct(){
        $this->model = new BookingModel();
    }

    public function createBooking($user_id,$destinasi_id,$email,$telp,
                                  $tanggal_booking,$tanggal_berangkat,
                                  $musim,$jumlah_orang,$note,$diskon,
                                  $cashback,$total)
    {
        return $this->model->addBooking($user_id,$destinasi_id,$email,$telp,
                                  $tanggal_booking,$tanggal_berangkat,
                                  $musim,$jumlah_orang,$note,$diskon,
                                  $cashback,$total);
    }

    public function getBooking($id){
        return $this->model->getDetailsBooking($id);
    }

    public function deleteBooking($id){
        return $this->model->deleteBooking($id);
    }
}
