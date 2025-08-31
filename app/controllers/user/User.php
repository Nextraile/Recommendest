<?php
class User implements UserInterface{
    private $model;

    public function __construct(){
        $this->model = new UserModel();
    }

    public function createUser($nama, $saldo = 0, $membership = "Non-Membership"){
        return $this->model->addUser($nama, $saldo, $membership);
    }

    public function getUserData($id): array{
        return $this->model->getUserDataById($id);
    }

    public function updateMembership($id, $new_membership){
        return $this->model->changeMembership($id, $new_membership);
    }

    public function topup($id, $jumlah){
        if ($jumlah > 0 && $jumlah <= 1000000000){
            $this->tambahSaldo($id, $jumlah);
        }
    }

    public function tambahSaldo($id, $jumlah){
        $current_saldo = (int)$this->model->getSaldo($id);
        $new_saldo = $current_saldo + $jumlah;
        $this->model->updateSaldo($id, $new_saldo);
    }

    public function kurangiSaldo($id, $jumlah){
        $current_saldo = (int)$this->model->getSaldo($id);
        $new_saldo = $current_saldo - $jumlah;
        $this->model->updateSaldo($id, $new_saldo);
    }
}