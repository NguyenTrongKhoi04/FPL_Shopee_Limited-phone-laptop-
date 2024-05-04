<?php

$router->get('upToShop', [App\Controllers\Admin\AdminController::class, 'upToShop']);
$router->get('upToShop/{id}', [App\Controllers\Admin\AdminController::class, 'upToShopSc']);
$router->post('submitUp', [App\Controllers\Admin\AdminController::class, 'submitUp']);