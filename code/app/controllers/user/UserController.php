<?php

namespace App\Controllers\User;

use App\Models\User\Product;
use App\Models\User\Category;
use App\Models\User\SubCategory;
use App\Models\User\Account;
use App\Models\User\Size;
use App\Models\User\Comment;

class UserController extends BaseController
{
    public $product;
    public $category;
    public $subCategory;
    public $account;
    public $size;
    public $comment;

    // Tạo magic funcion
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->subCategory = new SubCategory();
        $this->account = new Account();
        $this->size = new Size();
        $this->comment = new Comment();
    }
    // lấy sản phẩm, danh mục chỉnh, danh mục phụ cho vào trang product
    public function product()
    {
        $products = $this->product->getProduct(10);
        $categorys = $this->category->getCategory();
        $subCategorys = $this->subCategory->getSubCategory();
        // var_dump($products[0]);
        // die;
        // echo "<pre>";
        // var_dump($id_account);
        // die;
        // echo "</pre>";
        return $this->render('product', compact('products', 'categorys', 'subCategorys'));
    }
    // END
    // Đăng nhập
    // chuyển trang đăng nhập
    public function login()
    {
        return $this->render('login');
    }
    // kiểm tra thông tin đăng nhập
    public function loginRequest()
    {
        if (isset($_POST['login'])) {
            $gmail = $_POST['gmail'];
            $password = $_POST['password'];
            // var_dump($gmail,$password);
            // die;
            $checkAccount = $this->account->checkAccount($gmail, $password);
            // var_dump($checkAccount);
            // die;
            if ((isset($checkAccount)) && (is_array($checkAccount)) && (count($checkAccount) > 0)) {
                // extract($checkAccount[0]);
                $_SESSION['account'] = $checkAccount;
                // echo "<pre>";
                // var_dump($_SESSION['account']);
                // die;
                // echo "</pre>";
                if ($checkAccount[0]->role == 1) {
                    flash('success', 'Đăng nhập admin thành công', 'index-admin');
                } else {
                    flash('success', 'Đăng nhập người dùng thành công', 'product');
                }
            } else {
                $errors = [];
                if (empty($_POST['gmail'])) {
                    $errors['gmail']['required'] = "Bạn phải nhập gmail";
                } else {
                    if (!filter_var($_POST['gmail'], FILTER_VALIDATE_EMAIL)) {
                        $errors['gmail']['required'] = "Bạn phải nhập đúng định dạng gmail";
                    };
                };
                if (empty($_POST['password'])) {
                    $errors['password']['required'] = "Bạn phải nhập password";
                }
                return $this->render('login', compact('errors'));
            }
        }
    }
    //END
    // logout
    public function logout()
    {
        if (isset($_SESSION['account'])) {
            unset($_SESSION['account']);
            flash('success', 'Đăng xuất thành công', 'login/');
        }
    }
    // END
    // Đăng ký
    // chuyển trang đăng ký
    public function register()
    {
        return $this->render('register');
    }
    public function registerRequest()
    {
        if (isset($_POST['register'])) {
            $gmail = $_POST['gmail'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            $birthday =  $_POST['birthday'];
            $address = $_POST['address'];
            $errors = [];
            if (empty($_POST['gmail'])) {
                $errors['gmail'] = "Bạn phải nhập gmail";
            } else {
                if (!filter_var($_POST['gmail'], FILTER_VALIDATE_EMAIL)) {
                    $errors['gmail'] = "Bạn phải nhập đúng định dạng gamil";
                }
            }
            if (empty($_POST['password'])) {
                $errors['password'] = "Bạn phải nhập mật khẩu";
            }
            if (empty($_POST['username'])) {
                $errors['username'] = "Bạn phải nhập tên ";
            }
            if (empty($_POST['birthday'])) {
                $errors['birthday'] = "Bạn phải chọn ngày sinh ";
            }
            if (empty($_POST['address'])) {
                $errors['address'] = "Bạn phải nhập địa chỉ";
            }
            // var_dump($errors);
            // die;
            if (count($errors) > 0) {
                // có lỗi
                return $this->render('register', compact('errors'));
            } else {
                $addAccount = $this->account->addAccount($gmail, $password, $username, $birthday, $address);
                if ($addAccount) {
                    flash('success', 'Đăng ký thành công', 'login');
                }
            }
        }
    }
    //END
    // Chi tiết sản phẩm
    // chuyển trang chi tiết sản phẩm
    public function infoPro($id)
    {
        $products = $this->product->getOneProduct($id);
        $comments = $this->comment->getComment($id);
        $id_category = $products[0]['id_subcategory'];
        $relatedProduct = $this->product->getRelatedProduct($id, $id_category, 5);
        // echo "<pre>";
        // var_dump($relatedProduct);
        // echo "</pre>";
        // die;
        return $this->render('infomation_product', compact('products', 'comments', 'relatedProduct'));
    }
    // Hàm bình luận sản phẩm
    // public function addComment($id)
    // {
    //     $comment = $_POST['comment'];
    //     $id_user = $_SESSION['account']['id'];
    //     var_dump($_SESSION['account']['id']);
    //     die;
    //     $id_pro = $_POST['id'];
    //     $comments = $this->comment->addComment($id_user, $id_pro, $comment);
    // }
    // chuyển trang thông tin tài khoản
    public function infoAccout($id)
    {
        if(empty($_SESSION['account'])){
            return $this->render('login');
        }
        $account = $this->account->getAccount($id);
        // echo "<pre>";
        // var_dump($_SESSION['account'][0]);
        // echo "</pre>";
        // die;
        return $this->render('infomation_account', compact('account'));
        
    }

    // đổi thông tin tài khoản
    public function changeInfoAccount()
    {
        if (isset($_POST['update'])) {
            $id = $_SESSION['account'][0]->id;
            $username = $_POST['username'];
            $gmail = $_POST['gmail'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $newPassword = $_POST['newpassword'];
            $errors = [];
            if (empty($password)) {
                $errors['pass'] = "* Bạn phải nhập password";
            } else {
                if ($password != $_SESSION['account'][0]->password) {
                    $errors['pass'] = "* Bạn phải nhập đúng với mật khẩu";
                }
            }
            if (empty($username)) {
                $errors['username'] = "* Bạn phải nhập username";
            }
            if (empty($address)) {
                $errors['address'] = "* Bạn phải nhập địa chỉ";
            }
            if (count($errors) > 0) {
                // có lỗi
                // echo "<pre>";
                // var_dump($errors);
                // echo "</pre>";
                // die;
                $account = $this->account->getAccount($id);
                $_SESSION['account'][0] = $account;
                return $this->render('infomation_account', compact('errors', 'account'));
            } else {
                if (!empty($newPassword)) {
                    if ($password == $_SESSION['account'][0]->password) {
                        $updateAccount = $this->account->updateAccount($username, $gmail, $address, $newPassword, $id);
                        $account = $this->account->getAccount($id);
                        $_SESSION['account'][0] = $account;
                        // echo "<pre>";
                        // var_dump($_SESSION['account'][0]);
                        // echo "</pre>";
                        // die;
                        return $this->render('infomation_account', compact('account'));
                    }
                }
                if (empty($newPassword)) {
                    if ($password == $_SESSION['account'][0]->password) {
                        // var_dump($password);
                        // die;
                        $this->account->updateAccount($username, $gmail, $address, $password, $id);
                        $account = $this->account->getAccount($id);
                        $_SESSION['account'][0] = $account;
                        return $this->render('infomation_account', compact('account'));
                    }
                }
            }
        }
    }
    // chuyển trang giỏ hàng
    public function cart()
    {
        $product = $this->product->getProductCart();
        $categorys = $this->category->getCategory();
        $subCategorys = $this->subCategory->getSubCategory();
        return $this->render('cart', compact('product', 'categorys', 'subCategorys'));
    }
    // // chuyển trang quên mật khẩu
    // public function forgot_pass()
    // {
    //     $products = $this->product->getProduct();
    //     return $this->render('forgot_password');
    // }
    // // chuyển trang đổi mật khẩu
    // public function change_pass()
    // {
    //     $products = $this->product->getProduct();
    //     return $this->render('change_password');
    // }
    // // chuyển trang thông tin tài khoản




    // chuyển trang đặt hàng
    // public function order()
    // {
    //     $products = $this->product->getProduct();
    //     return $this->render('order');
    // }

    // // chuyển trang mua hàng
    // public function review_info()
    // {
    //     $products = $this->product->getProduct();
    //     return $this->render('review_infomation');
    // }
    // // chuyển trang thông tin đặt hàng
    // public function thongTinDatHang()
    // {
    //     $products = $this->product->getProduct();
    //     return $this->render('thongtindathang');
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
