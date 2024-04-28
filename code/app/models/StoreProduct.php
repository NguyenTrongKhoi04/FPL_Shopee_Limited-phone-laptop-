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