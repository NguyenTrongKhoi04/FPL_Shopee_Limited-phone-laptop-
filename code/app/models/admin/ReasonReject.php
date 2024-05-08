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
    
    public function checkReasonRejectName($field, $where)
    {
        $sql = "select $field from $this->table WHERE name= ? ";
        $this->setQuery($sql);
        return $this->loadAllRows([$where]);
    }

    public function getPro()
    {
        $sql = "SELECT * FROM product WHERE 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function addReasonReject($id, $name)
    {
        $sql = "INSERT INTO $this->table VALUES (?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name]);
    }

    public function deleteReasonReject($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function checkReason($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE reason_reject = ?";

        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
}