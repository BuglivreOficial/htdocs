<?php

use Core\Controller\HomeController;
use Core\Controller\MaintenanceController;
use Core\Controller\LoginController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/':
        $home = new HomeController();
        $home->index();
        break;

    case '/update':
        # code...
        break;

    case '/maintenance':
        $maintenance = new MaintenanceController();
        $maintenance->index();
        break;

    case '/login':
        $login = new LoginController();
        $login->index();
        break;

    case '/register':
        # code... 
        break;

    case '/reset-password':
        # code...
        break;

    //Parte responsavel pela url de administração

    case '/admin/maintenance':
        $maintenance = new MaintenanceController();
        $maintenance->creat();
        break;


    default:
        echo 'Não existe essa página!';
        break;
}