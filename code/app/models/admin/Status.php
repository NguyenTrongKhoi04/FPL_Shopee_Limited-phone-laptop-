<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Status extends BaseModel
{

    protected $table = "statusorder";
    // lấy danh sách sản phẩm

    public function getStatus($field)
    {
        $sql = "select $field from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    
// =======================
    public function getOrderRequestConfirm()
    {
        $sql = "
        select * from $this->table 
        INNER JOIN ship ON orders.id_ship = ship.id 
        INNER JOIN statusorder ON orders.status = statusorder.id
        INNER JOIN account ON orders.id_user = account.id
        WHERE statusorder.id = 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    // xây dựng hàm thêm sản phẩm
    public function addOrder($id, $tenSp, $gia)
    {
        //$sql = "INSERT INTO `Orders`(`id`, `ten_sp`, `gia`) VALUES ('[value-1]','[value-2]','[value-3]')";
        $sql = "insert into $this->table values (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $tenSp, $gia]);
    }

    // hàm truyền vào id để lấy ra chi tiết sản phẩm
    public function getDetailOrder($id)
    {
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow($id);
    }

    // xây dựng hàm sửa sản phẩm
    public function updateOrder($id, $tenSp, $gia)
    {
        $sql = "update $this->table set ten_sp = ?, gia = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$tenSp, $gia, $id]);
    }

    // xây dựng hàm xóa sản phẩm
    public function deleteOrder($id)
    {
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute($id);
    }
}