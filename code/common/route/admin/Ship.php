<?php

$router->get('listShip', [App\Controllers\Admin\ShipController::class, 'listShip']);
$router->get('addShip', [App\Controllers\Admin\ShipController::class, 'addShipUI']);
$router->post('addShip', [App\Controllers\Admin\ShipController::class, 'addShip']);
$router->get('stopShip/{id}', [App\Controllers\Admin\ShipController::class, 'stopShip']);
$router->get('continueShip/{id}', [App\Controllers\Admin\ShipController::class, 'continueShip']);