<?php

namespace App\Controllers\Admin;

use App\Models\Admin\StoreProduct;

class UpToShopController extends BaseAdminController
{
    public $product;
    public $account;
    public function __construct()
    {
        $this->product = new StoreProduct();
    }
    
    public function upToShop()
    {
        $cate = $this->product->getCategory();
        $subcate = $this->product->getSubAllCategory();
        $products = $this->product->listStorepro();

        // $cate1 = $this->product->getUpToShop1();
        // $cate2 = $this->product->getUpToShop2();
        $this->render('Products.upToShop', compact('cate', 'subcate', 'products'));
    }
    
    public function upToShopSc($id)
    {
        $subcate = $this->product->getSubAllCategory();
        $alldetail = $this->product->getStoreDetailProduct();
        $cate = $this->product->getCategory();
        $oneproduct = $this->product->getOneProduct($id);
        $this->render('Products.upToShopSc', compact('subcate', 'cate', 'oneproduct', 'alldetail'));
    }

    public function submitUp()
    {
        if (isset($_POST['btn-submit'])) {

            unset($_POST['btn-submit']);
            $arr = [];

            $count = count($_POST['id_pro']);
            for ($i = 0; $i < $count; $i++) {
                $subArray = [];
                foreach ($_POST as $key => $value) {
                    $subArray[] = $_POST[$key][$i];
                }
                $arr[] = $subArray;
            }

            $arr2 = [...$arr]; // test data structure

            foreach ($arr as $i) {
                $this->product->UpProduct($i);
            }

            $subcate = $this->product->getSubAllCategory();
            $alldetail = $this->product->getStoreDetailProduct();
            $cate = $this->product->getCategory();

            $check = "đưa sản phẩm lên sàn thành công";
            $cate = $this->product->getCategory();
            $subcate = $this->product->getSubAllCategory();
            $products = $this->product->listStorepro();
            
            
            $this->render('Products.upToShop', compact('cate', 'subcate', 'products', 'check'));
        }
    }
}