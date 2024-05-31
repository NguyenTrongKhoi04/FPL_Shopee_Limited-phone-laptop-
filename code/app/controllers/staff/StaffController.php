<?php

namespace App\Controllers\Staff;

use App\Models\Admin\Product;
use App\Models\Admin\Ship;

class StaffController extends BaseStaffController
{
    private $product, $ship;
    public function __construct()
    {
        $this->product = new Product();
        $this->ship = new Ship();
    }
    public function index($post = null)
    {
        $ship = $this->ship->getShip('*');
        $products = $this->product->getProductCount();

        return $this->render('order.index', compact('products', 'ship', 'post'));
    }

    public function confirmDetail()
    {
        extract($_POST);
        $detailProduct = $this->product->getDetailById_Product($id_product);
        $ship = $this->ship->getShip('*');
        $product = $this->product->getDetailProduct($id_product); // ! ghi sai tên hàm, hàm lấy pro từ id
        $post = $_POST;
        return $this->render('order.DetailConfirm', compact('product', 'detailProduct', 'post', 'ship'));
    }

    public function order()
    {
        extract($_POST);
        if ($back) {
            $this->index($_POST);
        }
    }
}
