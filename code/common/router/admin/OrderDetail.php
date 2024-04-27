<?php
$router->get('orderDetail/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrder']);
$router->get('orderDetailConfirm/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrderConfirm']);
$router->get('orderDetailTransfer/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrderTranfer']);