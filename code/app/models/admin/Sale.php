<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Sale extends BaseModel
{

    protected $table = "sale";
    // lấy danh sách sản phẩm

    public function getSale($field)
    {
        $sql = "select $field from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getPro()
    {
        $sql = "SELECT * FROM product WHERE 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function addSale($id,$nameSale, $dateSale, $timeSale, $valueSale)
    {
        $sql = "INSERT INTO $this->table VALUES (?, ? ,? ,? ,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$nameSale, $dateSale, $timeSale, $valueSale]);
    }

    public function deleteSale($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function checkSale($table,$id)
    {
        $sql = "SELECT * FROM $table WHERE sale = ?";
        
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
}