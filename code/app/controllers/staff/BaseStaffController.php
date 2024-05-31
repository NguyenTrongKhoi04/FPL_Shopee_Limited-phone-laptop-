<?php

namespace App\Controllers\Staff;

use eftec\bladeone\BladeOne;

class BaseStaffController
{

    protected function render($viewFile, $data = [])
    {
        $viewDir = "./app/views/staff";
        $storageDir = "./storage";
        $blade = new BladeOne($viewDir, $storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
}
