<?php

$router->get('listAccount', [App\Controllers\Admin\AccountController::class, 'listAccount']);
$router->get('addAccount', [App\Controllers\Admin\AccountController::class, 'addAccountUI']);
$router->post('addAccount', [App\Controllers\Admin\AccountController::class, 'addAccount']);
$router->get('stopAccount/{id}', [App\Controllers\Admin\AccountController::class, 'stopAccount']);
$router->get('updateAccount/{id}', [App\Controllers\Admin\AccountController::class, 'updateAccountUI']);
$router->post('updateAccount/{id}', [App\Controllers\Admin\AccountController::class, 'updateAccount']);
// $router->post('addShip', [App\Controllers\Admin\ShipController::class, 'addShip']);
// $router->get('continueShip/{id}', [App\Controllers\Admin\ShipController::class, 'continueShip']);