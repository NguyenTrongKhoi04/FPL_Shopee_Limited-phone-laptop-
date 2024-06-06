<?php

namespace App\Controllers\Admin;

use App\Models\Admin\StoreProduct;

class StoreDetailProduct extends BaseAdminController
{
    public $product;

    public function __construct()
    {
        $this->product = new StoreProduct();
    }

    public function seeDetail($id)
    {   $_SESSION['id_pro'] = $id;
        $id_pro = $id;
        $detailProducts = $this->product->seeDetailStore($id);
        $size = $this->product->size();
        $this->render('detailproduct.listStoreDetail', compact('detailProducts', 'size' , 'id_pro'));
    }


    public function updateDetailStoreProducts($id)
    {
        if (isset($_POST['btn-submit'])) {

            $this->product->updateDetailStoreProduct($id, $_POST['image'], $_POST['price'], $_POST['size']);
            $check = 'update thành công';
            $detailProducts = $this->product->seeDetailStore($id);
            $size = $this->product->size();
            return $this->render('detailproduct.listStoreDetail', compact('check', 'detailProducts', 'size',));
        } else {
            echo "lỗi";
        }
    }

    public function deleteStoreDetailProduct($id){
        $this->product->deleteStoreDetailProduct($id);
        $check = 'Xóa thành công';
        $detailProducts = $this->product->seeDetailStore($id);
        $size = $this->product->size();
        return $this->render('detailproduct.listStoreDetail', compact('check', 'detailProducts', 'size',));
    }

    public function insertStoreDetailProduct(){
        $error = [];
        if (isset($_POST['btn-submit'])) {
            if (empty($_POST['image'])) {
                $error[] = 'vui long nhap ảnh';
            }
            if (empty($_POST['price'])) {
                $error[] = 'vui long nhap  price';
            }

            if (count($error) > 0) {
                $check = 'xem lại các dữ liệu nhập vào';
                $detailProducts = $this->product->seeDetailStore($_POST['id_pro']);
                $size = $this->product->size();
                $this->render('detailproduct.listStoreDetail', compact('detailProducts', 'size', 'check'));            
                
            } else {

                $this->product->insertStoreDetailProduct($_SESSION['id_pro'] ,$_POST['image'], $_POST['price'], $_POST['size']);
                $check = 'thêm thành công';
                $detailProducts = $this->product->seeDetailStore($_SESSION['id_pro']);
                $size = $this->product->size();
                unset($_SESSION['id_pro']);
                $this->render('detailproduct.listStoreDetail', compact('detailProducts', 'size', 'check'));  
                }
        }
    }



    
}