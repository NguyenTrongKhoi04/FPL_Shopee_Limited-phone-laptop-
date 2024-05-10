<?php

namespace App\Controllers\Admin;

use App\Models\StoreProduct;

class AdminController extends BaseAdminController
{
    public $product;
    public $account;
    public function __construct()
    {
        $this->product = new StoreProduct();
    }

}