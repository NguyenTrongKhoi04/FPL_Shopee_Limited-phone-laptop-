<?php

$router->post('add-storeProduct', [App\Controllers\Admin\AdminController::class, 'addStorepro']);
$router->post('edit-storeDetailProduct/{id}', [App\Controllers\Admin\AdminController::class, 'updateDetailStoreProducts']);
$router->post('edit-storeProduct/{id}', [App\Controllers\Admin\AdminController::class, 'updateStoreProducts']);
$router->get('deleteStoreProduct/{id}', [App\Controllers\Admin\AdminController::class, 'deleteStoreProduct']);
$router->get('listStorepro', [App\Controllers\Admin\AdminController::class, 'listStorepro']);