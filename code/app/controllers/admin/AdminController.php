<?php

namespace App\Controllers\Admin;

use App\Models\StoreProduct;

class AdminController extends BaseAdminController
{
    public $product;
    public $account;

    public function index_admin()
    {
        $products = $this->product->getProducts();
        return $this->render('index');
    }
}
