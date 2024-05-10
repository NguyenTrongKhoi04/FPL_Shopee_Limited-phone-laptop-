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

    public function checkShipName($field, $where)
    {
        $sql = "select $field from $this->table WHERE nameship= ? ";
        $this->setQuery($sql);
        return $this->loadAllRows([$where]);
    }

    public function stopShip($id)
    {
        $sql = "UPDATE $this->table SET statusship = 1 WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    
    public function continueShip($id)
    {
        $sql = "UPDATE $this->table SET statusship = 0 WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function checkShip($codeVoucher)
    {
        $sql = "select * from $this->table WHERE codevoucher = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$codeVoucher]);
    }

    public function addShip($id,$nameship, $timeship, $priceship)
    {
        $sql = "INSERT INTO $this->table VALUES (?, ? ,? ,? ,? )";
        $this->setQuery($sql);
        return $this->execute([$id,$nameship, $timeship, $priceship,""]);
    }
}