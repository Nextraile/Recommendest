<?php
class UserSilver extends User {
    public function __construct($nama){
        parent::__construct();
        $this->createUser($nama, $saldo = 50000, $membership = "Silver");
    }
}