<?php
$router->get('info-acccount/{id}', [App\Controllers\User\AccountController::class, 'infoAccout']);
$router->post('change-info-acccount/', [App\Controllers\User\AccountController::class, 'changeInfoAccount']);

$router->get('userListAccount', [App\Controllers\User\AccountController::class, 'index']);
$router->get('userUpdateAccount', [App\Controllers\User\AccountController::class, 'index']);
$router->get('userlistAccount', [App\Controllers\User\AccountController::class, 'index']);
$router->get('listAccount', [App\Controllers\User\AccountController::class, 'index']);