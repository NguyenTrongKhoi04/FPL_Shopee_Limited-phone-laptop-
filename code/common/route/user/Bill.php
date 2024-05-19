<?php
$router->get('listbill', [App\Controllers\User\BillController::class, 'listBill']);
$router->post('updateStatus', [App\Controllers\User\BillController::class, 'updateStatus']);
$router->get('detailBill/{id}', [App\Controllers\User\BillController::class, 'detailBill']);