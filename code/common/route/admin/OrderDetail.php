<?php
$router->get('orderDetail/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrder']);
$router->get('orderDetailRequestConfirm/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrderRequestConfirm']);
$router->get('orderDetailConfirm/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrderConfirm']);
$router->get('orderDetailTransfer/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrderTransfer']);
$router->get('orderDetailSuccess/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrderSuccess']);
$router->get('orderDetailReject/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrderReject']);
$router->get('orderDetailReturn/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrderReturn']);