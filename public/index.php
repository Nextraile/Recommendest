<?php
require_once __DIR__ . '/../app/autoload.php';
require_once __DIR__ . '/session/session.php';

$page = $_GET['page'] ?? 'home';

switch($page)
{
    case 'home':
        $controller = new HomeController();
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
