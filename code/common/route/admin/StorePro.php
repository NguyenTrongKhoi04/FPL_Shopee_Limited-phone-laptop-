<?php

$router->post('add-storeProduct', [App\Controllers\Admin\StoreProductController::class, 'addStorepro']);
$router->post('edit-storeDetailProduct/{id}', [App\Controllers\Admin\StoreProductController::class, 'updateDetailStoreProducts']);
$router->post('edit-storeProduct/{id}', [App\Controllers\Admin\StoreProductController::class, 'updateStoreProducts']);
$router->get('deleteStoreProduct/{id}', [App\Controllers\Admin\StoreProductController::class, 'deleteStoreProduct']);
$router->get('listStorepro', [App\Controllers\Admin\StoreProductController::class, 'listStorepro']);