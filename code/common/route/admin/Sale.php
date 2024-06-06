<?php

$router->get('listSale', [App\Controllers\Admin\SaleController::class, 'listSale']);
$router->get('addSale', [App\Controllers\Admin\SaleController::class, 'addSaleUI']);
$router->post('addSale', [App\Controllers\Admin\SaleController::class, 'addSale']);
$router->get('deleteSale/{id}', [App\Controllers\Admin\SaleController::class, 'deleteSale']);