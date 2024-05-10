<?php

$router->get('upToShop', [App\Controllers\Admin\UpToShopController::class, 'upToShop']);
$router->get('upToShop/{id}', [App\Controllers\Admin\UpToShopController::class, 'upToShopSc']);
$router->post('submitUp', [App\Controllers\Admin\UpToShopController::class, 'submitUp']);