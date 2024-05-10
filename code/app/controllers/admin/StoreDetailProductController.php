<?php

namespace App\Controllers\Admin;

use App\Models\Admin\StoreProduct;

class StoreDetailProductController extends BaseAdminController{
    public $product;
    public $account;
    public function __construct()
    {
        $this->product = new StoreProduct();
    }

    public function updateDetailStoreProducts($id)
    {
        if (isset($_POST['btn-submit'])) {

            $this->product->updateDetailStoreProduct($id, $_POST['image'], $_POST['price'], $_POST['size'], $_POST['count']);
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
}