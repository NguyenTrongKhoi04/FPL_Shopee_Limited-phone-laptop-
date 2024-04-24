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

// khu vực cần quan tâm -----------
// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function () {
    return "trang chủ";
});
//định nghĩa đường dẫn trỏ đến Product Controller
// user
$router->get('product', [App\Controllers\UserController::class, 'index']);
$router->get('cart', [App\Controllers\UserController::class, 'cart']);
$router->get('change-pass', [App\Controllers\UserController::class, 'change_pass']);
$router->get('forgot-pass', [App\Controllers\UserController::class, 'forgot_pass']);
$router->get('info-acccount', [App\Controllers\UserController::class, 'infoAccout']);
$router->get('info-pro', [App\Controllers\UserController::class, 'infoPro']);
$router->get('login', [App\Controllers\UserController::class, 'login']);
$router->get('order', [App\Controllers\UserController::class, 'order']);
$router->get('register', [App\Controllers\UserController::class, 'register']);
$router->get('review_info', [App\Controllers\UserController::class, 'review_info']);
$router->get('thong-tin-dat-hang', [App\Controllers\UserController::class, 'thongTinDatHang']);
// end user
// admin
$router->get('index-admin', [App\Controllers\Admin\AdminController::class, 'index_admin']);
$router->get('err', [App\Controllers\Admin\AdminController::class, 'err']);
$router->get('blank', [App\Controllers\Admin\AdminController::class, 'blank']);
$router->get('buttons', [App\Controllers\Admin\AdminController::class, 'buttons']);
$router->get('cards', [App\Controllers\Admin\AdminController::class, 'cards']);
$router->get('charts', [App\Controllers\Admin\AdminController::class, 'charts']);
$router->get('forgot_pass', [App\Controllers\Admin\AdminController::class, 'forgot_pass']);
$router->get('login-admin', [App\Controllers\Admin\AdminController::class, 'login']);
$router->get('register-admin', [App\Controllers\Admin\AdminController::class, 'register']);
$router->get('tables', [App\Controllers\Admin\AdminController::class, 'tables']);
$router->get('until_animation', [App\Controllers\Admin\AdminController::class, 'until_animation']);
$router->get('until_border', [App\Controllers\Admin\AdminController::class, 'until_border']);
$router->get('until_color', [App\Controllers\Admin\AdminController::class, 'until_color']);
$router->get('until_other', [App\Controllers\Admin\AdminController::class, 'until_other']);

// $router->get('add-product', [App\Controllers\ProductController::class, 'addProduct']);
// $router->post('post-product', [App\Controllers\ProductController::class, 'postProduct']);
// $router->get('detail-product/{id}', [App\Controllers\ProductController::class, 'detail']);
// $router->post('edit-product/{id}', [App\Controllers\ProductController::class, 'editProduct']);
// $router->get('delete-product/{id}', [App\Controllers\ProductController::class, 'deleteProduct']);
// khu vực cần quan tâm -----------
//$router->get('test', [App\Controllers\ProductController::class, 'index']);

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
