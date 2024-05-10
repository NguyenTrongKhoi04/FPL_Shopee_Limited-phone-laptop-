<?php
$router->post('add-subcategory', [App\Controllers\Admin\SubCategoryController::class, 'addSubCategory']);
$router->get('deleteSubcate/{id}', [App\Controllers\Admin\SubCategoryController::class, 'deleteSubcate']);
$router->get('detailSubcate/{id}', [App\Controllers\Admin\SubCategoryController::class, 'detailSubcate']);
$router->post('updateSubcate/{id}', [App\Controllers\Admin\SubCategoryController::class, 'updateSubcate']);