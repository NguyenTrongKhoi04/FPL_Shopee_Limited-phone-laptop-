<?php

namespace App\Models\User;

use App\Models\BaseModel;

class SubCategory extends BaseModel
{
    protected $item = "subcategory";

    public function getSubCategory()
    {
        $sql = "SELECT * from subcategory";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
