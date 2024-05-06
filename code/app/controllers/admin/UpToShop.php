<?php

namespace App\Controllers\Admin;

use App\Models\StoreProduct;
use App\Models\Account;

class UpToShop extends BaseAdminController
{
    public $product;
    public $account;
    public function __construct()
    {
        $this->product = new StoreProduct();
        $this->account = new Account();
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
}