<?php

interface UserInterface {
    public function createUser($nama, $saldo, $membership);
    public function getUserData($id): array;
}

