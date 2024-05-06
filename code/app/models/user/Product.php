<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Product extends BaseModel
{

    protected $item = "product";
    // lấy danh sách sản phẩm 10 sản phẩm

    public function getProduct($limit)
    {
        $sql = "SELECT * from $this->item 
        join detailproduct on $this->item.id = detailproduct.id_pro
        join sale on $this->item.sale = sale.id
        limit
        " . "$limit";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    // lấy chi tiết sản phẩm
    public function getOneProduct($id)
    {
        $sql = "SELECT 
        detailproduct.id AS detail_product_id,
        detailproduct.*,
        $this->item.*,
        size.*,
        subcategory.*,
        category.*,
        sale.*
    FROM detailproduct 
    JOIN $this->item ON detailproduct.id_pro = $this->item.id 
    JOIN size ON detailproduct.size = size.id
    JOIN subcategory ON $this->item.id_subcategory = subcategory.id
    JOIN category ON subcategory.id_category = category.id
    JOIN sale ON $this->item.sale = sale.id
    WHERE $this->item.id = '$id'";
        $this->setQuery($sql);
        return $this->loadAllRowsArray();
    }
    // lấy sản phẩm liên quan
    public function getRelatedProduct($id_pro, $id_subcategory, $limit)
    {
        $sql = "SELECT * from $this->item 
        join detailproduct on $this->item.id = detailproduct.id_pro
        join sale on $this->item.sale = sale.id
        where id_subcategory = $id_subcategory and id_pro <> $id_pro limit
        " . "$limit";
        // var_dump($sql);
        // die;
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function Cart($arr){
        $sql = "SELECT * FROM cart WHERE id_pro IN ($arr)";
        $this->setQuery($sql);
        return $this->loadAllRows([$arr]);
    }
    public function getProducts()
    {
    }
    // xây dựng hàm thêm sản phẩm
    public function addProduct($id, $tenSp, $gia)
    {
        //$sql = "INSERT INTO `products`(`id`, `ten_sp`, `gia`) VALUES ('[value-1]','[value-2]','[value-3]')";
        $sql = "insert into $this->item values (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $tenSp, $gia]);
    }

    // hàm truyền vào id để lấy ra chi tiết sản phẩm
    public function getDetailProduct($id)
    {
        $sql = "select * from $this->item where id = ?";
        $this->setQuery($sql);
        return $this->loadRow($id);
    }

    // xây dựng hàm sửa sản phẩm
    public function updateProduct($id, $tenSp, $gia)
    {
        $sql = "update $this->item set ten_sp = ?, gia = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$tenSp, $gia, $id]);
    }

    // xây dựng hàm xóa sản phẩm
    public function deleteProduct($id)
    {
        $sql = "delete from $this->item where id = ?";
        $this->setQuery($sql);
        return $this->execute($id);
    }
}
