<?php

namespace App\Models;

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
