<?php

$router->get('listReasonReject', [App\Controllers\Admin\ReasonRejectController::class, 'listReasonReject']);
$router->get('addReasonReject', [App\Controllers\Admin\ReasonRejectController::class, 'addReasonRejectUI']);
$router->post('addReasonReject', [App\Controllers\Admin\ReasonRejectController::class, 'addReasonReject']);
$router->get('deleteReasonReject/{id}', [App\Controllers\Admin\ReasonRejectController::class, 'deleteReasonReject']);