<?php
class UserGold extends User {
    public function __construct($nama, $saldo = 100000, $membership = "Gold"){
        parent::__construct();
        $this->createUser($nama, $saldo, $membership);
    }
}
