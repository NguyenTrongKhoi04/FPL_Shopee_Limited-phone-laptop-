<?php
$router->get('listAccount', [App\Controllers\Admin\AdminController::class, 'listAccount']);
$router->post('addAccount', [App\Controllers\Admin\AdminController::class, 'addAccount']);
$router->get('deleteAccount/{id}', [App\Controllers\Admin\AdminController::class, 'deleteAccount']);