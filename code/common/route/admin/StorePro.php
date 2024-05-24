<?php

$router->post('add-storeProduct', [App\Controllers\Admin\StoreProductController::class, 'addStorepro']);
$router->post('edit-storeProduct/{id}', [App\Controllers\Admin\StoreProductController::class, 'updateStoreProducts']);
$router->get('deleteStoreProduct/{id}', [App\Controllers\Admin\StoreProductController::class, 'deleteStoreProduct']);
$router->get('listStorepro', [App\Controllers\Admin\StoreProductController::class, 'listStorepro']);
$router->post('edit-storeDetailProduct/{id}', [App\Controllers\Admin\StoreDetailProduct::class, 'updateDetailStoreProducts']);
$router->get('deleteStoreDetailProduct/{id}', [App\Controllers\Admin\StoreDetailProduct::class, 'deleteStoreDetailProduct']);
$router->get('seeDetail/{id}', [App\Controllers\Admin\StoreDetailProduct::class, 'seeDetail']);
$router->post('insertStoreDetailProduct', [App\Controllers\Admin\StoreDetailProduct::class, 'insertStoreDetailProduct']);