<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Voucher extends BaseModel
{

    protected $table = "voucher";
    // lấy danh sách sản phẩm

    public function getVoucher($field)
    {
        $sql = "select $field from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function stopVoucher($id){
        $sql = "UPDATE $this->table SET countvoucher = 0 WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function checkVoucher($codeVoucher){
        $sql = "select * from $this->table WHERE codevoucher = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$codeVoucher]);
    }

    public function addVoucher($id, $codeVoucher, $nameVoucher, $valueVoucher, $countVoucher)
    {
        $sql = "INSERT INTO $this->table VALUES (?, ? ,? ,? ,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $codeVoucher, $nameVoucher, $valueVoucher, $countVoucher]);
    }
}