<?php
class User{
    private $model;

    public function __construct(){
        $this->model = new UserModel();
    }

    public function createUser($nama, $saldo = 0, $membership = "non membership"){
        return $this->model->addUser($nama, $saldo, $membership);
    }

    public function getUserData($id){
        return $this->model->getUserById($id);
    }

    public function updateMembership($id, $new_membership){
        return $this->model->changeMembership($id, $new_membership);
    }

    public function addSaldo($id, $saldo){
        $current_saldo = $this->model->getSaldo($id);
        $new_saldo = $current_saldo + $saldo;
        $this->model->updateSaldo($id, $new_saldo);
    }

    public function kurangiSaldo($id, $saldo){
        $current_saldo = $this->model->getSaldo($id);
        $new_saldo = $current_saldo - $saldo;
        $this->model->updateSaldo($id, $new_saldo);
    }

    public function cashback($id, $amount){
        $current_cashback = $this->model->getCashback($id);
        $new_cashback = $current_cashback + $amount;
        $this->model->updateCashback($id, $new_cashback);
    }
}