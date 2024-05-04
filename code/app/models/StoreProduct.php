<?php

namespace App\Models;
class StoreProduct extends BaseModel {

    protected $table = "storepro";

    public function listStorepro(){
        $sql = "select * from storepro";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getOneProduct($id){
        $sql = "select * from storepro where id_subcategory = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function getStoreDetailProduct(){
        $sql = "select * from StoreDetailProduct";
        // echo "<pre>"
        // print_r
        // echo "<pre>"

        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getCountStoreDetailProduct(){
        $sql = "select count(id) from StoreDetailProduct";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function deleteStoreProduct($id){
        $sql = "DELETE FROM `storepro` WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);

    }
    public function getSize(){
        $sql = "select * from size";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    
    public function updateDetailStoreProduct( $id, $image , $price , $size , $count){
        $sql =  "UPDATE `storedetailproduct` SET image=?,price=?,size=?,count=? WHERE id=?";
         $this->setQuery($sql);
         return $this->execute([$image , $price , $size , $count,$id]);
     }
     public function updateStoreProduct( $id, $name_pro , $quantity , $datepro , $id_subcategory , $description){
        $sql =  "UPDATE `storepro` SET name_pro= ?,quantity= ?,datepro= ?,id_subcategory= ?,description= ? WHERE id = ? ";
         $this->setQuery($sql);
         return $this->execute([$name_pro , $quantity , $datepro , $id_subcategory , $description,$id]);
     }
    public function getCategory(){
        $sql = "select * from category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getSubAllCategory(){
        $sql = "select * from subcategory";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getSubcategory($id_category){
        $sql = "select * from subcategory where id_category = ?";
        $this->setQuery($sql);
        return $this->loadRow($id_category);
    }

    public function get1Subcategory($id){
        $sql = "select * from subcategory where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function addStoreProduct( $name_pro, $quantity, $datepro, $id_subcategory, $description){
        $sql = "INSERT INTO `storepro`(name_pro, quantity, datepro, id_subcategory, description) VALUES (?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([ $name_pro, $quantity, $datepro, $id_subcategory, $description]);
    }

    public function addSubCate( $name_subcate, $id_category){
        $sql = "INSERT INTO `subcategory`(name_subcate ,id_category) VALUES (?,?)";
        $this->setQuery($sql);
        return $this->execute([ $name_subcate, $id_category]);
    }

    public function updateProduct($namepro , $quantity , $datepro , $id_subcategory , $description, $id){
       $sql =  "UPDATE `storepro` SET `name_pro`='[value-2]',`quantity`='[value-3]',`datepro`='[value-4]',`id_subcategory`='[value-5]',`description`='[value-6]' WHERE id=?";
        $this->setQuery($sql);
        return $this->execute([$namepro , $quantity , $datepro , $id_subcategory , $description, $id]);
    }

    public function addToSopSc($id, $namepro, $quantity, $datepro, $id_subcategory, $description, $sale){
        $sql = "INSERT INTO `product`(`id`, `namepro`, `quantity`, `datepro`, `id_subcategory`, `description`, `sale`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')";
    }

    public function deleteSubcate($id){
        $sql = "DELETE FROM `subcategory` WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function updateSubcate($id , $name_subcate , $id_category){
        $sql = "UPDATE `subcategory` SET name_subcate=?,id_category=? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([ $name_subcate , $id_category, $id]);
    }


    public function Test(){
        $sql = "INSERT INTO `product` (namepro, quantity, datepro, id_subcategory ,description) Value (1,2,3,4,5)";
        $this->setQuery($sql);
        return $this->loadID();
    }
    public function doneUpToShop($id){
        $sql = "INSERT INTO `product` (namepro, quantity, datepro, id_subcategory ,description)
        SELECT name_pro, quantity, datepro, id_subcategory, description
        FROM storepro WHERE id=?";
        // var_dump($sql); die;
        $this->setQuery($sql);
        return $this->loadID([$id]);
    }
    public function doneUpdetai($id_pro, $image, $price, $size, $count){
        $sql = "INSERT INTO `detailproduct`(id_pro, image, price, size, count) VALUES (?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_pro, $image, $price, $size, $count]);
    }

    public function getDetailStoreProduct($id_subcategory){
        $sql = "select * from storedetailproduct s inner join storepro p on(s.id_pro=p.id) where p.id_subcategory = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id_subcategory]);
    }

    public function submitUp($id_pro, $image, $price, $size, $count){
        $sql = "INSERT INTO `detailproduct`(`id_pro`, `image`, `price`, `size`, `count`) VALUES (?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_pro, $image, $price, $size, $count]);
    }
    public function getProduct(){

    }
    // public function getUpToShop1(){
    //     $sql = "SELECT * FROM `subcategory` WHERE id_category = 1";
    //     $this->setQuery($sql);
    //     return $this->loadAllRows();
    // }

    // public function getUpToShop2(){
    //     $sql = "SELECT * FROM `subcategory` WHERE id_category = 2";
    //     $this->setQuery($sql);
    //     return $this->loadAllRows();
    // }


    
}