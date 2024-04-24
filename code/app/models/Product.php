<?php

namespace App\Models;
class Product extends BaseModel {

    protected $table = "products";
    // lấy danh sách sản phẩm

    public function getProduct(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }



    // xây dựng hàm thêm sản phẩm
    public function addProduct($id,$tenSp,$gia){
        //$sql = "INSERT INTO `products`(`id`, `ten_sp`, `gia`) VALUES ('[value-1]','[value-2]','[value-3]')";
        $sql = "insert into $this->table values (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$tenSp,$gia]);
    }

    // hàm truyền vào id để lấy ra chi tiết sản phẩm
    public function getDetailProduct($id){
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow($id);
    }

    // xây dựng hàm sửa sản phẩm
    public function updateProduct($id,$tenSp,$gia){
        $sql = "update $this->table set ten_sp = ?, gia = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$tenSp, $gia, $id]);
    }

    // xây dựng hàm xóa sản phẩm
    public function deleteProduct($id){
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute($id);
    }

}