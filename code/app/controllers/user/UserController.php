<?php

namespace App\Controllers;

use App\Models\Product;

class UserController extends BaseController
{
    public $product;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products = $this->product->getProduct();
        return $this->render('product');
    }
    public function cart()
    {
        $products = $this->product->getProduct();
        return $this->render('cart');
    }
    public function forgot_pass()
    {
        $products = $this->product->getProduct();
        return $this->render('forgot_password');
    }
    public function change_pass()
    {
        $products = $this->product->getProduct();
        return $this->render('change_password');
    }
    public function infoAccout()
    {
        $products = $this->product->getProduct();
        return $this->render('infomation_account');
    }
    public function infoPro()
    {
        $products = $this->product->getProduct();
        return $this->render('infomation_product');
    }
    public function login()
    {
        $products = $this->product->getProduct();
        return $this->render('login');
    }
    public function order()
    {
        $products = $this->product->getProduct();
        return $this->render('order');
    }
    public function register()
    {
        $products = $this->product->getProduct();
        return $this->render('register');
    }
    public function review_info()
    {
        $products = $this->product->getProduct();
        return $this->render('review_infomation');
    }
    public function thongTinDatHang()
    {
        $products = $this->product->getProduct();
        return $this->render('thongtindathang');
    }
    //     public function addProduct()
    //     {
    //         return $this->render('product.add');
    //     }

    //     public function postProduct()
    //     {
    //         //khi submit ở màn hình addproduct sẽ bắn về class này
    //         if (isset($_POST['add'])) {
    //             //validate
    //             // tạo ra mảng lỗi = rỗng
    //             $errors = [];
    //             // tên sản phẩm không đc bỏ trống
    //             if (empty($_POST['ten_sp'])) {
    //                 $errors[] = "Tên sản phẩm không được để trống";
    //             }
    //             // giá không đc bỏ trống
    //             if (empty($_POST['gia'])) {
    //                 $errors[] = "Giá sản phẩm không được để trống";
    //             }

    //             if (count($errors) > 0) {
    //                 // có lỗi
    //                 flash('errors', $errors, 'add-product');
    //             } else {
    //                 // không lỗi
    //                 $result = $this->product->addProduct(NULL, $_POST['ten_sp'], $_POST['gia']);
    //                 if ($result) {
    //                     flash('success', 'Thêm mới thành công', 'add-product');
    //                 }
    //             }
    //         }
    //     }

    //     public function detail($id)
    //     {
    //         $product = $this->product->getDetailProduct($id);
    //         return $this->render('product.edit', compact('product'));
    //     }

    //     public function editProduct($id)
    //     {
    //         if (isset($_POST['edit'])) {
    //             $result = $this->product->updateProduct($id, $_POST['ten_sp'], $_POST['don_gia']);
    //             if ($result) {
    //                 flash('success', 'Sửa thành công', 'detail-product/' . $id);
    //             }
    //         }
    //     }

    //     public function deleteProduct($id)
    //     {
    //         $result = $this->product->deleteProduct($id);
    //         if ($result) {
    //             flash('success', 'Xóa thành công', 'list-product');
    //         }
    //     }
}
