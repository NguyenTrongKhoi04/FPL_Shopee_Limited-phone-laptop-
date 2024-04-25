<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Order extends BaseModel
{

    protected $table = "orders";
    // lấy danh sách sản phẩm

    public function getOrder($field)
    {
      
    }

    public function getOrderRequestConfirm($field)
    {
        $sql = "
        SELECT $field 
        FROM $this->table 
        INNER JOIN account ON orders.id_user = account.id
        LEFT JOIN orderdetail ON orderdetail.id_order = orders.id 
        WHERE orders.status = 1
        GROUP BY orders.id
        ORDER BY time_order";
        // var_dump($sql);die;
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getDetailOrder($id, $field)
    {
        $sql = "select $field from $this->table 
        INNER JOIN orderdetail ON orderdetail.id_order = orders.id 
        INNER JOIN product ON orderdetail.id_pro = product.id
        INNER JOIN detailproduct ON detailproduct.id_pro = product.id
        WHERE orders.id = ?";
        $this->setQuery($sql);
        return $this->loadRow($id);
    }


    
    /**
     * =============================================================================
     *                                         
     * =============================================================================
     */
    // xây dựng hàm thêm sản phẩm
    public function addOrder($id, $tenSp, $gia)
    {
        //$sql = "INSERT INTO `Orders`(`id`, `ten_sp`, `gia`) VALUES ('[value-1]','[value-2]','[value-3]')";
        $sql = "insert into $this->table values (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $tenSp, $gia]);
    }

    // hàm truyền vào id để lấy ra chi tiết sản phẩm

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