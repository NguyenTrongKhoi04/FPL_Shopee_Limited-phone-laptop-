<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Ship extends BaseModel
{

    protected $table = "ship";
    // lấy danh sách sản phẩm

    public function getShip($field)
    {
        $sql = "select $field from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}