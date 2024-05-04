<?php
$router->post('add-subcategory', [App\Controllers\Admin\AdminController::class, 'addSubCategory']);
$router->get('deleteSubcate/{id}', [App\Controllers\Admin\AdminController::class, 'deleteSubcate']);
$router->get('detailSubcate/{id}', [App\Controllers\Admin\AdminController::class, 'detailSubcate']);
$router->post('updateSubcate/{id}', [App\Controllers\Admin\AdminController::class, 'updateSubcate']);