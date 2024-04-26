<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Category extends BaseModel
{
    protected $item = "category";
    // lấy danh sách danh mục
    public function getCategory()
    {
        $sql = "SELECT * from $this->item ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
