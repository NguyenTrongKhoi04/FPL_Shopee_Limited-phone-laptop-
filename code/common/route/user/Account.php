<?php
$router->get('info-acccount/{id}', [App\Controllers\User\AccountController::class, 'infoAccout']);
$router->post('change-info-acccount/', [App\Controllers\User\AccountController::class, 'changeInfoAccount']);

// $router->get('userListAccount', [App\Controllers\User\AccountController::class, 'index']);
$router->get('userUpdateAccount', [App\Controllers\User\AccountController::class, 'index']);
// $router->get('userlistAccount', [App\Controllers\User\AccountController::class, 'index']);
// $router->get('listAccount', [App\Controllers\User\AccountController::class, 'index']);

$router->get('change-pass', [App\Controllers\User\AccountController::class, 'change_pass_UI']);
$router->post('change-pass', [App\Controllers\User\AccountController::class, 'change_pass']);