<?php

namespace App\Controllers\Admin;

use eftec\bladeone\BladeOne;

class BaseAdminController
{

    protected function render($viewFile, $data = [])
    {
        $viewDir = "./app/views/admin";
        $storageDir = "./storage";
        $blade = new BladeOne($viewDir, $storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die;
    }
}