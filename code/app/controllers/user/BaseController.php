<?php

namespace App\Controllers\User;

use eftec\bladeone\BladeOne;

class BaseController
{

    protected function render($viewFile, $data = [])
    {
        $viewDir = "./app/views/user";
        $storageDir = "./storage";
        $blade = new BladeOne($viewDir, $storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
}