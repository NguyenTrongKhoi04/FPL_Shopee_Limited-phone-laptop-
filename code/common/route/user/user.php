<?php


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