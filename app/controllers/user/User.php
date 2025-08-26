<?php
class User{
    private $model;

    public function __construct($nama, $saldo = 0, $membership = "Non-Membership"){
        $this->model = new UserModel();
        $this->createUser($nama, $saldo, $membership);
    }

    public function createUser($nama, $saldo, $membership){
        return $this->model->addUser($nama, $saldo, $membership);
    }

    public function getUserData($id){
        return $this->model->getUserById($id);
    }

    public function updateMembership($id, $new_membership){
        return $this->model->changeMembership($id, $new_membership);
    }

    public function topup($id, $jumlah){
        if ($jumlah > 0 && $jumlah <= 1000000000){
            $this->model->tambahSaldo($id, $jumlah);
        }
    }

    public function tambahSaldo($id, $jumlah){
        $current_saldo = $this->model->getSaldo($id);
        $new_saldo = $current_saldo + $jumlah;
        $this->model->updateSaldo($id, $new_saldo);
    }

    public function kurangiSaldo($id, $jumlah){
        $current_saldo = $this->model->getSaldo($id);
        $new_saldo = $current_saldo - $jumlah;
        $this->model->updateSaldo($id, $new_saldo);
    }

    public function cashback($id, $jumlah){
        $current_cashback = $this->model->getCashback($id);
        $new_cashback = $current_cashback + $jumlah;
        $this->model->updateCashback($id, $new_cashback);
    }
}