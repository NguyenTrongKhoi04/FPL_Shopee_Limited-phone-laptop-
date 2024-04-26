<?php

namespace App\Controllers\User;

use App\Models\User\Product;
use App\Models\User\Category;
use App\Models\User\SubCategory;
use App\Models\User\Account;

class UserController extends BaseController
{
    public $product;
    public $category;
    public $subCategory;
    public $account;


    // Tạo magic funcion
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->subCategory = new SubCategory();
        $this->account = new Account();
    }
    // lấy sản phẩm, danh mục chỉnh, danh mục phụ cho vào trang product
    public function product()
    {
        $products = $this->product->getProduct();
        $categorys = $this->category->getCategory();
        $subCategorys = $this->subCategory->getSubCategory();
        return $this->render('product', compact('products', 'categorys', 'subCategorys'));
    }
    // END
    // Đăng nhập
    // chuyển trang đăng nhập
    public function login()
    {
        return $this->render('login');
    }
    //END
    // chuyển trang giỏ hàng
    public function cart()
    {
        $products = $this->product->getProduct();
        return $this->render('cart');
    }
    // chuyển trang quên mật khẩu
    public function forgot_pass()
    {
        $products = $this->product->getProduct();
        return $this->render('forgot_password');
    }
    // chuyển trang đổi mật khẩu
    public function change_pass()
    {
        $products = $this->product->getProduct();
        return $this->render('change_password');
    }
    // chuyển trang thông tin tài khoản
    public function infoAccout()
    {
        $products = $this->product->getProduct();
        return $this->render('infomation_account');
    }
    // chuyển trang chi tiết sản phẩm
    public function infoPro()
    {
        $products = $this->product->getProduct();
        return $this->render('infomation_product');
    }

    // chuyển trang đặt hàng
    public function order()
    {
        $products = $this->product->getProduct();
        return $this->render('order');
    }
    // chuyển trang đăng ký
    public function register()
    {
        $products = $this->product->getProduct();
        return $this->render('register');
    }
    // chuyển trang mua hàng
    public function review_info()
    {
        $products = $this->product->getProduct();
        return $this->render('review_infomation');
    }
    // chuyển trang thông tin đặt hàng
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
