<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class OrderDetail extends BaseModel
{

    protected $table = "orderdetail";
    // lấy danh sách sản phẩm

    public function getDetailOrder($id, $field)
    {
        $sql = "
        SELECT 
                $field 
        FROM $this->table 
        INNER JOIN orders ON orders.id = orderdetail.id_order
        INNER JOIN detailproduct ON detailproduct.id = orderdetail.id_pro
        INNER JOIN product ON product.id = detailproduct.id
        INNER JOIN size ON size.id = detailproduct.size
        WHERE id_order = ?";
        $this->setQuery($sql);
        // echo "<pre>";
        // print_r($this->loadRow([$id]));
        // echo "</pre>";
        // die;
        return $this->loadRow([$id]);
    }
}