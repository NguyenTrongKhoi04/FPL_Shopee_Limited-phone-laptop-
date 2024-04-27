<?php
$router->get('orderDetail/{id}', [App\Controllers\Admin\OrderDetailController::class, 'detailOrder']);