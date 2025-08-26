<?php
require_once __DIR__ . '/../app/autoload.php';
require_once __DIR__ . '/session/session.php';

$method = $_SERVER['REQUEST_METHOD'];
$route = $_GET['route'] ?? 'home';
$action = $_POST['action'];


// switch($route)
// {
//     case 'home':
//         $controller = new HomeController();
//         $controller->index($_SESSION['user_id']);
//         break;

//     case 'list-destinasi':
//         $controller = new DestinasiController();
//         $controller->index();
//         break;

//     case 'topup':
//         $controller = new User();
//         $controller->index();
//         break;

//     default:
//         http_response_code(404);
//         require_once __DIR__ . '/../app/views/404.php';
//         break;
// }

if ($method  === 'GET'){
    if (isset($route)){
        if ($route === 'home'){
            $controller = new HomeController();
            $controller->index($_SESSION['user_id']);
            exit;
        } else if ($route === 'list'){
            $controller = new ListDestinasiController();
            $controller->getListDestinasi();
            exit;
        } else if ($route === 'topup') {
            $controller = new TopupController();
            $controller->index();
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
            $controller->processForm($_SESSION['user_id'], $_POST['jumlah']);
            exit;
        }
    }
}