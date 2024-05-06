<?php

$router->get('listVoucher', [App\Controllers\Admin\VoucherController::class, 'listVoucher']);
$router->get('addVoucher', [App\Controllers\Admin\VoucherController::class, 'addVoucherUI']);
$router->post('addVoucher', [App\Controllers\Admin\VoucherController::class, 'addVoucher']);
$router->get('stopVoucher/{id}', [App\Controllers\Admin\VoucherController::class, 'stopVoucher']);