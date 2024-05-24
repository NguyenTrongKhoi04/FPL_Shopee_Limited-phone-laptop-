<?php
namespace App\Models\Admin;
use App\Models\BaseModel;

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
    
    public function updateDetailStoreProduct( $id, $image , $price , $size ){
        $sql =  "UPDATE `storedetailproduct` SET image=?,price=?,size=? WHERE id=?";
         $this->setQuery($sql);
         return $this->execute([$image , $price , $size ,$id]);
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
        $sql = "select  * from storedetailproduct s inner join storepro p on(s.id_pro=p.id) where p.id_subcategory = ?";
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


    public function checkTTStoreProduct($name_pro){
        $sql = "select * from storepro where name_pro = '$name_pro'";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function seeDetailStore($id_pro){
        $sql = "SELECT s.id AS id_detail, s.*, si.*, p.* 
        FROM storedetailproduct s   
        INNER JOIN storepro p ON s.id_pro = p.id   
        INNER JOIN `size` si ON si.id = s.size   
        WHERE s.id_pro = $id_pro";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function size(){
        $sql = "select * from size ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function deleteStoreDetailProduct($id){
        $sql = "delete from storedetailproduct where id = $id";
        $this->setQuery($sql);
        return $this->execute();
    }


    public function insertStoreDetailProduct($id_pro , $image , $price , $size){
        $sql = "INSERT INTO storedetailproduct(id_pro, image, price, size) VALUES (?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_pro , $image , $price , $size]);


}
    // public function updateDetailStoreProduct(){

    // }

    /**
     * =============================================================================
     *                                KHÔI ĐẸP ZAI
     * =============================================================================
     */

    public function UpProduct($arr=[]){
    // [0] => id pro
    // [1] => id detail
    // [2] => price detailpro
    // [3] => ảnh
    // [4] => id size
    // [5] => số lượng
    
        $sqlGetStorePro = "SELECT *
                    FROM storepro
                    WHERE id = ?;
                    ";
        $this->setQuery($sqlGetStorePro);
        $name = $this->loadAllRows([$arr[0]]);
        
        // check tồn tại trong table product chưa
        $sqlCheck = "SELECT product.*
                    FROM product
                    WHERE namepro = ?;
                    ";
        $this->setQuery($sqlCheck);
        $dataCheck = $this->loadAllRows([$name[0]->name_pro]);

        if($dataCheck == null){
            //insert into product 
            $sql = "INSERT INTO `product` (namepro, id_subcategory, description)
            SELECT name_pro, id_subcategory, description
            FROM storepro WHERE id = ? ";
            $this->setQuery($sql);
            $this->execute([$arr[0]]);
            $lastID = $this->getLastId();

            // Lấy quantity hiện tại + quantity vừa cho vào 
            $sql = "UPDATE product SET quantity = quantity + ?, datepro = NOW() WHERE id = ?";
            $this->setQuery($sql);
            $this->execute([$arr[5], $lastID]);
            
            //insert vào detailproduct
            $sql = "INSERT INTO detailproduct (`id_pro`, `image`, `price`, `size`, `count`) VALUE (?,?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$lastID,$arr[3],$arr[2],$arr[4], $arr[5]]);
        }else{
            $sql = "UPDATE product SET quantity = quantity + ?, datepro = NOW() WHERE id = ?";
            $this->setQuery($sql);
            $this->execute([$arr[5], $dataCheck[0]->id]);

            // check detailpro đó tồn tại hay chưa
            $sql = "SELECT * FROM detailproduct WHERE size = ? AND id_pro = ?";
            $this->setQuery($sql);
            $dataCheckDetail = $this->loadAllRows([$arr[4], $dataCheck[0]->id]);            

            if($dataCheckDetail == null){
                $sql = "INSERT INTO detailproduct (`id_pro`, `image`, `price`, `size`, `count`) VALUE (?,?,?,?,?)";
                $this->setQuery($sql);
                return $this->execute([$dataCheck[0]->id, $arr[3], $arr[2], $arr[4], $arr[5]]);
            }else{   
                $sql =  "UPDATE `detailproduct` SET image= ?, price= ?, count= count + ? WHERE id_pro = ? ";
                $this->setQuery($sql);
                return $this->execute([$arr[3], $arr[2], $arr[5], $dataCheck[0]->id]);
            }

        }
        
        // var_dump($this->loadAllRows([$name[0]->name_pro]));die;


        return $this->loadID();
    }
    
}