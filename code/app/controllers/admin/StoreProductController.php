<?php

namespace App\Controllers\Admin;

use App\Models\Admin\StoreProduct;

class StoreProductController extends BaseAdminController
{
    public $product;

    public function __construct()
    {
        $this->product = new StoreProduct();
    }

    public function listStorepro()
    {
        $products = $this->product->listStorepro();
        $subcategory = $this->product->getSubAllCategory();
        $storedetaiproduct = $this->product->getStoreDetailProduct();
        $size = $this->product->getSize();
        $cate = $this->product->getCategory();
        $countpro = $this->product->getCountStoreDetailProduct();
        return $this->render('Products.listStorepro', compact('products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
    }

    public function updateStoreProducts($id)
    {
        if (isset($_POST['btn-submit'])) {
            $datepro = date("Y-m-d");
            $this->product->updateStoreProduct($id, $_POST['name_pro'], $_POST['quantity'], $datepro, $_POST['id_subcategory'], $_POST['description']);
            $check = 'update thành công';
            $products = $this->product->listStorepro();
            $subcategory = $this->product->getSubAllCategory();
            $storedetaiproduct = $this->product->getStoreDetailProduct();
            $size = $this->product->getSize();
            $cate = $this->product->getCategory();
            $countpro = $this->product->getCountStoreDetailProduct();
            $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
        } else {
            echo "lỗi";
        }
    }

    public function addStorepro()
    {
        $error = [];
        if (isset($_POST['btn-submit'])) {
            if (empty($_POST['name_pro'])) {
                $error[] = 'vui long nhap ten';
            }
            if (empty($_POST['quantity'])) {
                $error[] = 'vui long nhap số lượng';
            }
            if (empty($_POST['id_subcategory'])) {
                $error[] = 'vui long chọn loại';
            }
            if (empty($_POST['description'])) {
                $error[] = 'vui long nhap mo ta';
            }
            if (count($error) > 0) {
                $check = 'xem lại các dữ liệu nhập vào';
                $products = $this->product->listStorepro();
                $subcategory = $this->product->getSubAllCategory();
                $storedetaiproduct = $this->product->getStoreDetailProduct();
                $size = $this->product->getSize();
                $cate = $this->product->getCategory();
                $countpro = $this->product->getCountStoreDetailProduct();
                $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
            } else {
                $checkTT = $this->product->checkTTStoreProduct($_POST['name_pro']);
                if($checkTT){
                    $check = "sản phẩm đã tồn tại";
                    $products = $this->product->listStorepro();
                    $subcategory = $this->product->getSubAllCategory();
                    $storedetaiproduct = $this->product->getStoreDetailProduct();
                    $size = $this->product->getSize();
                    $cate = $this->product->getCategory();
                    $countpro = $this->product->getCountStoreDetailProduct();
                    $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));

                }
                else{
                $datepro = date("Y-m-d");
                $this->product->addStoreProduct($_POST['name_pro'], $_POST['quantity'], $datepro, $_POST['id_subcategory'], $_POST['description']);
                $check = 'thêm thành công';
                $products = $this->product->listStorepro();
                $subcategory = $this->product->getSubAllCategory();
                $storedetaiproduct = $this->product->getStoreDetailProduct();
                $size = $this->product->getSize();
                $cate = $this->product->getCategory();
                $countpro = $this->product->getCountStoreDetailProduct();
                $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
            }
            }
        }
    }

    public function deleteStoreProduct($id)
    {
        $this->product->deleteStoreProduct($id);
        $check = 'xóa thành công';
        $products = $this->product->listStorepro();
        $subcategory = $this->product->getSubAllCategory();
        $storedetaiproduct = $this->product->getStoreDetailProduct();
        $size = $this->product->getSize();
        $cate = $this->product->getCategory();
        $countpro = $this->product->getCountStoreDetailProduct();
        $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
    }
}