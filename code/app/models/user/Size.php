<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Size extends BaseModel
{
    protected $item = "size";

    public function getSize()
    {
        $sql = "SELECT * from $this->item";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
