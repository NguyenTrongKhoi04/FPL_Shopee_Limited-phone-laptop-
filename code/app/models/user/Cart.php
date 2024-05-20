<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Cart extends BaseModel
{
    public function addCart($id_acc , $id_pro, $count){
        $sql = "INSERT INTO `cart`(id_acc, id_pro, count) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_acc , $id_pro, $count]);
    }
    public function cartInLogin($id_acc){
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
    public function countCart($id_acc){
        $sql = "select * from cart where id_acc = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id_acc]);
    }
    public function deleteCart($arr){
        $inValues = implode(',', $arr);
        $sql = "DELETE FROM `cart` WHERE id IN ($inValues)";
        $this->setQuery($sql);
        return $this->execute();
    }


    public function getConfirmCart($id){
        $inID = implode(',', $id);
        $sql = "select * from cart where id in ($inID)";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function checkVoucher($codevoucher){
        $sql = "select * from voucher where codevoucher = '$codevoucher'";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    public function quantityVoucher($id){
        $sql = "update voucher set countvoucher = countvoucher - 1 where id = $id";
        $this->setQuery($sql);
        return $this->execute();
    }

    public function checkSpBuy($id_pro, $sl){
        $sql = "update detailproduct set count = count - $sl where id = $id_pro";
        $this->setQuery($sql);
        $this->execute();
        $sql = "update product p inner join detailproduct t on(p.id=t.id_pro) set p.quantity = p.quantity - $sl where t.id = $id_pro";
        $this->setQuery($sql);
        return $this->execute(); 

    }

    //check xem conf ddur sp trong shop khoong:
    public function CheckProInShop($arr){
        $inID = implode(',', $arr);
        $sql = "select count from detailproduct where id in ($inID)";
        $this->setQuery($sql);
        return $this->loadAllRows();

    }

    public function getAllShip(){
        $sql = "select * from ship";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function insertOrders($totalOders , $id_voucher , $timeOders, $id_user , $id_ship ){
        $sql = "INSERT INTO  `orders` ( totalorder ,  id_voucher ,  status ,  time_order ,  id_user ,  id_ship ,  status_pay ) VALUES (  ?, ?, 1, ?, ?, ?, 0 )";
        $this->setQuery($sql);
        $this->execute([$totalOders , $id_voucher , $timeOders, $id_user , $id_ship ]);
        return $this->getLastInsertId();
    }
    public function getLastInsertId() {
        return $this->pdo->lastInsertId();
    }

    public function insertOderDetail($id_order , $id_pro , $count , $comment , $address, $phone){
        $sql = "INSERT INTO `orderdetail`( `id_order`, `id_pro`, `count`, `comment`, `address`, `phone`) VALUES (?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_order , $id_pro , $count , $comment , $address, $phone]);
    }

    public function truVoucher($voucher = null){
        if($voucher == null) return;
        $sql = "UPDATE `voucher` SET `countvoucher`= countvoucher - 1 WHERE codevoucher = $voucher";
        $this->setQuery($sql);
        return $this->execute();
    }

    //insert vào order và order detail
    // tôi đã làm xong phần check xem còn đủ sản phẩm không, 
    // còn thiếu:
    // +, ship
    // +, innser vaof order vaf oderdetail, theem vaò od xong phải lấy được ra last id sau đó dùng id đó để tạo ra oddetal!d

}
