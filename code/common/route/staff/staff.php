<?php
$router->get('indexstaff', [App\Controllers\User\UserController::class, 'IndexStaff']);
$router->post('subIndexStaff', [App\Controllers\User\UserController::class, 'subIndexStaff']);

?>