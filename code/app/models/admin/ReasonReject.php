<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class ReasonReject extends BaseModel
{

    protected $table = "reasonreject";
    // lấy danh sách sản phẩm

    public function getReasonReject($field)
    {
        $sql = "select $field from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}