<?php

namespace App\Controllers\User;

use App\Controllers\User\BaseController;
use App\Models\User\Product;
use App\Models\User\Category;
use App\Models\User\SubCategory;
use App\Models\User\Account;
use App\Models\User\Cart;
use App\Models\User\Size;
use App\Models\User\Comment;

class CartController extends BaseController
{
    public $product;
    public $category;
    public $subCategory;
    public $account;
    public $size;
    public $comment;
    public $cart;

    // Tạo magic funcion
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->subCategory = new SubCategory();
        $this->account = new Account();
        $this->size = new Size();
        $this->comment = new Comment();
        $this->cart = new Cart();
    }

    // chuyển trang giỏ hàng
    public function cart()
    {

        if (empty($_SESSION['account'])) {
            if (empty($_SESSION['cart'])) {
                $products = $this->product->getProduct(10);
                $categorys = $this->category->getCategory();
                $subCategorys = $this->subCategory->getSubCategory();
                $check = "Chưa có sản phẩm nào trong giỏ hàng";
                return $this->render('product', compact('products', 'categorys', 'subCategorys', 'check'));
            } else {
                $product = $this->product->getProductCart();
                $categorys = $this->category->getCategory();
                $subCategorys = $this->subCategory->getSubCategory();
                return $this->render('cart', compact('product', 'categorys', 'subCategorys'));
            }
        } else {
            $id_acc = $_SESSION['account'][0]->id;
            $getcount = $this->cart->cartInLogin($id_acc);
            $_SESSION['countCart'] = count($getcount);
            if ($_SESSION['countCart'] == 0) {
                $products = $this->product->getProduct(10);
                $categorys = $this->category->getCategory();
                $subCategorys = $this->subCategory->getSubCategory();
                $check = "Chưa có sản phẩm nào trong giỏ hàng";
                return $this->render('product', compact('products', 'categorys', 'subCategorys', 'check'));
            }
            $id = $_SESSION['account'][0]->id;
            $cart = $this->cart->cartInLogin($id);
            $pro = array_column($cart, 'id_pro');
            $id_pro = implode(",", $pro);

            $product = $this->cart->getProductCart($id_pro);
            $quantity = $this->cart->countCart($id);

            return $this->render('cart', compact('product', 'quantity',));
        }
    }

    //add vào giỏ hàng
    public function addCart()
    {
        $id = $_SESSION['account'][0]->id;
        foreach ($_SESSION['cart'] as $cart) {
            $idpro = $cart['id'];
            $quantity = $cart['quantity'];
            unset($_SESSION['cart']);
            $addcart = $this->cart->addCart($id, $idpro, $quantity);
            // render:
            $id = $_SESSION['account'][0]->id;
            $cart = $this->cart->cartInLogin($id);
            $pro = array_column($cart, 'id_pro');
            $id_pro = implode(",", $pro);
            $product = $this->cart->getProductCart($id_pro);
            $quantity = $this->cart->countCart($id);
            return $this->render('cart', compact('product', 'quantity'));
        }
    }


    public function deleteCart()
    {

        if (isset($_POST['xoamucdachon'])) {
            if (isset($_SESSION['account'])) {
                $selectedProducts = $_POST['selectedProduct'];
                $this->cart->deleteCart($selectedProducts);
                $check = "xóa thành công";
                $id_acc = $_SESSION['account'][0]->id;
                $getcount = $this->cart->cartInLogin($id_acc);
                $_SESSION['countCart'] = count($getcount);
                if ($_SESSION['countCart'] == 0) {
                    $products = $this->product->getProduct(10);
                    $categorys = $this->category->getCategory();
                    $subCategorys = $this->subCategory->getSubCategory();
                    $check = "xóa thành công";
                    return $this->render('product', compact('products', 'categorys', 'subCategorys', 'check'));
                }
                $id = $_SESSION['account'][0]->id;
                $cart = $this->cart->cartInLogin($id);
                $pro = array_column($cart, 'id_pro');
                $id_pro = implode(",", $pro);

                $product = $this->cart->getProductCart($id_pro);
                $quantity = $this->cart->countCart($id);

                return $this->render('cart', compact('product', 'quantity', 'check'));
            }
            else{
                //CHƯA XÓA ĐƯỢC Ở SESSION   
                $selectedProducts = $_POST['selectedProduct'];

                // echo "<pre>";
                // print_r($_SESSION['cart']);
                foreach($_SESSION['cart'] as $key => $value){
                    foreach($selectedProducts as $sl){
                            if($value['id'] == $sl){
                                unset($_SESSION['cart'][$key]);                

                            }
                        }
                }
                
                }

                }
                if (empty($_SESSION['cart'])) {
                    $products = $this->product->getProduct(10);
                    $categorys = $this->category->getCategory();
                    $subCategorys = $this->subCategory->getSubCategory();
                    $check = "Chưa có sản phẩm nào trong giỏ hàng";
                    return $this->render('product', compact('products', 'categorys', 'subCategorys', 'check'));
                } else {
                    $product = $this->product->getProductCart();
                    $categorys = $this->category->getCategory();
                    $subCategorys = $this->subCategory->getSubCategory();
                    return $this->render('cart', compact('product', 'categorys', 'subCategorys'));
                }
            }




        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $selectedProducts = json_decode($_POST['selectedProducts']);

        //     $account = $this->account->getAccount($_SESSION['account'][0]->id)->id;
        //     // print_r($account);
        //     // die;
        //     return $this->render('thongtindathang');
        // }
    }

