<?php

$router->post('insertSession', [App\Controllers\User\CartController::class, 'insertSession']);
$router->get('cart', [App\Controllers\User\CartController::class, 'cart']);
$router->get('addCart', [App\Controllers\User\CartController::class, 'addCart']);
$router->post('deleteCart', [App\Controllers\User\CartController::class, 'deleteCart']);


?>