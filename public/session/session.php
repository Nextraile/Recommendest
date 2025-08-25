<?php
session_start();
if(!isset($_SESSION['user_id'])){
    $user = new UserController($this->conn);
    exit();
}