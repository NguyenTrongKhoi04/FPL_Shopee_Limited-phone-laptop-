<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});

$router->get('/', function () {
    return "trang chủ";
});

// include router admin
// TODO: Load All Router
$arr_directory_admin = scandir('common/route/admin');
$arr_directory_user = scandir('common/route/user');
// quét một thư mục và trả về một mảng chứa tên của các tệp và thư mục trong đó

// include route admin
foreach ($arr_directory_admin as $item) {
    if ($item != '..' && $item != '.' && file_exists('common/route/admin/' . $item)) {
        include_once 'common/route/admin/' . $item;
    }
};
// include route user
foreach ($arr_directory_user as $item) {
    if ($item != '..' && $item != '.' && file_exists('common/route/user/' . $item)) {
        include_once 'common/route/user/' . $item;
    }
};

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;