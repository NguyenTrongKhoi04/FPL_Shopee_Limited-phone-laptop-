<?php

$router->get('listRequestConfirm', [App\Controllers\Admin\OrderController::class, 'listRequestConfirm']);
$router->get('listAllOrder', [App\Controllers\Admin\OrderController::class, 'listAllOrder']);
$router->get('listConfirm', [App\Controllers\Admin\OrderController::class, 'listConfirm']);
$router->get('listTransfer', [App\Controllers\Admin\OrderController::class, 'listTransfer']);
$router->get('listSuccess', [App\Controllers\Admin\OrderController::class, 'listSuccess']);
$router->get('listReject', [App\Controllers\Admin\OrderController::class, 'listReject']);
$router->get('listReturn', [App\Controllers\Admin\OrderController::class, 'listRequestConfirm']);
$router->get('confirmOrder/{id}', [App\Controllers\Admin\OrderController::class, 'detailOrder']);