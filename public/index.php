<?php
require_once __DIR__ . '/session/session.php';
require_once __DIR__ . '/../app/autoload.php';
// define('BASE_URL', 'http://localhost/Recommendest/public');
define('BASE_URL', 'http://recommendest.com');

$method = $_SERVER['REQUEST_METHOD'];
$route = $_GET['route'] ?? 'home';
$destinasi_id = $_GET['destinasi_id'] ?? '';
$booking_id = $_GET['booking_id'] ?? '';
$action = $_POST['action'] ?? '';

if ($method  === 'GET'){
    if (isset($route)){
        if ($route === 'home'){
            $controller = new HomeController();
            $controller->index($_SESSION['user_id']);
            exit;
        } else if ($route === 'list'){
            $controller = new ListDestinasiController();
            $controller->index();
            exit;
        } else if ($route === 'topup') {
            $controller = new TopupController();
            $controller->index();
            exit;
        } else if ($route === 'destinasi') {
            $controller = new DestinasiController();
            $controller->index($destinasi_id);
            exit;
        } else if ($route === 'booking') {
            $controller = new BookingController();
            $controller->index();
            exit;
        } else if ($route === 'riwayat-booking') {
            $controller = new BookingController();
            $controller->getRiwayatBooking($_SESSION['user_id']);
            exit;
        } else if ($route === 'detail-booking') {
            $controller = new BookingController();
            $controller->getBooking($booking_id);
            exit;
        } else {
            http_response_code(404);
            require_once __DIR__ . '/../app/views/404.php';
            exit;
        }
    }
}

if ($method === 'POST'){
    if (isset($action)){
        if ($action === 'rekomendasi'){
            $controller = new RekomendasiController();
            $controller->processForm($_POST);
            exit;
        } else if ($action === 'topup') {
            $controller = new TopupController();
            $controller->processForm($_POST);
            exit;
        } else if ($action === 'booking') {
            $controller = new BookingController();
            $controller->processForm($_POST);
            exit;
        } else if ($action === 'create_booking') {
            $controller = new BookingController();
            $controller->createBooking($_POST);
            exit;
        } else if ($action === 'delete_booking') {
            $controller = new BookingController();
            $controller->deleteBooking($_POST['id']);
            exit;
        } else {
            http_response_code(404);
            require_once __DIR__ . '/../app/views/404.php';
            exit;
        }
    }
}