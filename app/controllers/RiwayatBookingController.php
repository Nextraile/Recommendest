<?php
class RiwayatBookingController {
    private $model;

    public function __construct(){
        $this->model = new BookingModel();
    }

    public function getRiwayatBooking($user_id){
        return $this->model->getAllUserBookings($user_id);
    }

    public function getBookingData($id){
        return $this->model->getDetailsBooking($id);
    }

    public function deleteBookingById($id){
        return $this->model->deleteBooking($id);
    }
}
