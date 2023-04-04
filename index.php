<?php

require_once 'vendor/autoload.php';


// MVC:
// Model - Atsakingas uz duomenu paemima is duomenu bazes
// View - Sablonai kurie sukompiliuojami pag; perduodama informacija
// Controller - Kotruoliuoja pries tai buvusiu dvieju sekciju veikla



// Automatinis klasiu pridejimas i koda:

// function autoload_classes($class)
// {
//     $class = str_replace('\\', '/', $class);
//     // echo $class;
//     if (is_file($class . '.php'))
//         include $class . '.php';
// }


// spl_autoload_register('autoload_classes');

// echo '<pre>';
// print_r($_SERVER);

// $klein = new \Klein\Klein();

// $prefix = '/fullstack-projektai/youtube-project/';

// $klein->respond('GET', $prefix.'/', function () {

//     return Controllers\Homepage::index();
// });

// $klein->dispatch();


//Routerio kurimas

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {

    case 'category':
        Controllers\Homepage::byCategory($_GET['id']);
        break;
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            Controllers\Admin::registerIndex();
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Controllers\Admin::processRegistration();
        }
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            Controllers\Admin::loginIndex();
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Controllers\Admin::processLogin();
        }
        break;
    case 'logout':
        session_destroy();
        header('Location: ?page=/');
        break;
    case 'videos':
        Controllers\Video::toSingleVideo($_GET['id']);
        break;

    default:
        Controllers\Homepage::index();
}
