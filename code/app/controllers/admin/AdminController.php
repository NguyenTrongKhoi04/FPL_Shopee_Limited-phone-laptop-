<?php

namespace App\Controllers\Admin;

use App\Models\StoreProduct;

class AdminController extends BaseAdminController
{
    public $product;
    public function __construct()
    {
        $this->product = new StoreProduct();
    }

    public function index_admin()
    {
        $product = $this->product->getProduct();
        return $this->render('index');
    }
    public function err()
    {
        $product = $this->product->getProduct();
        return $this->render('404');
    }
    public function blank()
    {
        $product = $this->product->getProduct();
        return $this->render('blank');
    }
    public function buttons()
    {
        $product = $this->product->getProduct();
        return $this->render('buttons');
    }
    public function cards()
    {
        $product = $this->product->getProduct();
        return $this->render('cards');
    }
    public function charts()
    {
        $product = $this->product->getProduct();
        return $this->render('charts');
    }
    public function forgot_pass()
    {
        $product = $this->product->getProduct();
        return $this->render('forgot-password');
    }
    public function login()
    {
        $product = $this->product->getProduct();
        return $this->render('login');
    }
    public function register()
    {
        $product = $this->product->getProduct();
        return $this->render('register');
    }
    public function tables()
    {
        $product = $this->product->getProduct();
        return $this->render('tables');
    }
    public function until_animation()
    {
        $product = $this->product->getProduct();
        return $this->render('utilities-animation');
    }
    public function until_border()
    {
        $product = $this->product->getProduct();
        return $this->render('utilities-border');
    }
    public function until_color()
    {
        $product = $this->product->getProduct();
        return $this->render('utilities-color');
    }
    public function until_other()
    {
        $product = $this->product->getProduct();
        return $this->render('utilities-other');
    }


    //quản lý kho:
    public function listStorepro(){
        $products = $this->product->listStorepro();
        $subcategory = $this->product->getSubategory();
        $storedetaiproduct = $this->product->getStoreDetailProduct();
        $size = $this->product->getSize();
        return $this->render('Products.listStorepro', compact('products','subcategory', 'storedetaiproduct', 'size'));
    }
    // public function getSubategory(){
    //     $subcategory = $this->product->getSubategory();
    //     return $this->render('Products.listStorepro', compact('subcategory'));
    // }
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