<?php
require_once __DIR__ . '/../app/autoload.php';
require_once __DIR__ . '/session/session.php';

$route = $_GET['route'] ?? 'home';

switch($route)
{
    case 'home':
        $controller = new HomeController($_SESSION['user_id']);
        break;

    case 'rekomendasi':
        $controller = new RekomendasiController();
        $controller->index();
        break;

    default:
        http_response_code(404);
        require_once __DIR__ . '/../views/404.php';
        break;
}
