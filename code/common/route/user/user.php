<?php
$router->get('product', [App\Controllers\User\UserController::class, 'product']);
$router->get('cart', [App\Controllers\User\UserController::class, 'cart']);
$router->get('change-pass', [App\Controllers\User\UserController::class, 'change_pass']);
$router->get('forgot-pass', [App\Controllers\User\UserController::class, 'forgot_pass']);
$router->get('info-acccount/{id}', [App\Controllers\User\UserController::class, 'infoAccout']);
$router->post('change-info-acccount/', [App\Controllers\User\UserController::class, 'changeInfoAccount']);
$router->any('info-pro/{id}', [App\Controllers\User\UserController::class, 'infoPro']);
$router->post('add-comment/{id}', [App\Controllers\User\UserController::class, 'addComment']);
$router->get('login', [App\Controllers\User\UserController::class, 'login']);
$router->post('login-request', [App\Controllers\User\UserController::class, 'loginRequest']);
$router->get('logout', [App\Controllers\User\UserController::class, 'logout']);
$router->get('order', [App\Controllers\User\UserController::class, 'order']);
$router->get('register', [App\Controllers\User\UserController::class, 'register']);
$router->post('register-request', [App\Controllers\User\UserController::class, 'registerRequest']);
$router->get('review_info', [App\Controllers\User\UserController::class, 'review_info']);
$router->get('thong-tin-dat-hang', [App\Controllers\User\UserController::class, 'thongTinDatHang']);

?>