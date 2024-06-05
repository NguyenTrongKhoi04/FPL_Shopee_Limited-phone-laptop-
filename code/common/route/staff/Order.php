<?php
$router->get('staff_Product', [App\Controllers\Staff\StaffController::class, 'index']);
$router->post('confirmDetail', [App\Controllers\Staff\StaffController::class, 'confirmDetail']);
$router->post('staffOrder', [App\Controllers\Staff\StaffController::class, 'order']);

// $router->get('stopAccount/{id}', [App\Controllers\Admin\AccountController::class, 'stopAccount']);