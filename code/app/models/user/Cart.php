<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Cart extends BaseModel
{
    public function addCart($id_acc, $id_pro, $count)
    {
        $sql = "INSERT INTO `cart`(id_acc, id_pro, count) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_acc, $id_pro, $count]);
    }

    public function cartInLogin($id_acc)
    {
        $sql = "select * from `cart` where id_acc = $id_acc";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getProductCart($id_pro)
    {
        $sql = "SELECT detailproduct.id AS detail_product_id,
            detailproduct.*,subcategory.*, product.*,sale.*, size.* FROM detailproduct inner join product on (detailproduct.id_pro=product.id) inner join subcategory  on(product.id_subcategory=subcategory.id) inner join sale on(product.sale=sale.id) inner join size on(detailproduct.size=size.id) WHERE detailproduct.id IN ($id_pro)";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }


    public function countCart($id_acc)
    {
        $sql = "select * from cart where id_acc = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id_acc]);
    }
}