<?php
class UserGold extends User {
    public function __construct($nama, $saldo = 100000){
        parent::__construct();
        $this->createUser($nama, $saldo, $membership = "Gold");
    }
}
