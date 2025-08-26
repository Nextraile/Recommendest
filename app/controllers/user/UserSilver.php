<?php
class UserGold extends User {
    public function __construct($nama, $saldo = 50000, $membership = "Silver"){
        parent::__construct();
        $this->createUser($nama, $saldo, $membership);
    }
}