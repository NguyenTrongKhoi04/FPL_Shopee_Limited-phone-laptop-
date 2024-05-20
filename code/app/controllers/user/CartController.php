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
                return $this->render('cart.cart', compact('product', 'categorys', 'subCategorys'));
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

            return $this->render('cart.cart', compact('product', 'quantity',));
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
            return $this->render('cart.cart', compact('product', 'quantity'));
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
                $_SESSION['id_detailpro'] = $id_pro;
                $product = $this->cart->getProductCart($id_pro);
                $quantity = $this->cart->countCart($id);

                return $this->render('cart.cart', compact('product', 'quantity', 'check'));
            } else {
                //CHƯA XÓA ĐƯỢC Ở SESSION   
                $selectedProducts = $_POST['selectedProduct'];

                // echo "<pre>";
                // print_r($_SESSION['cart']);
                foreach ($_SESSION['cart'] as $key => $value) {
                    foreach ($selectedProducts as $sl) {
                        if ($value['id'] == $sl) {
                            unset($_SESSION['cart'][$key]);
                        }
                    }
                }
            }
        }
        if(isset($_POST['buyAll'])){
            $id = $_SESSION['account'][0]->id;
            $account = $this->account->getAccount($id);
            $cart = $this->cart->getConfirmCart($_POST['selectedProduct']);
            $_SESSION['postProduct'] = $_POST['selectedProduct'];


            $id = $_SESSION['account'][0]->id;
            $cart = $this->cart->cartInLogin($id);
            $pro = array_column($cart, 'id_pro');
            $id_pro = implode(",", $pro);
            $_SESSION['id_detailpro'] = $id_pro;
            $ship = $this->cart->getAllShip();
            $product = $this->cart->getProductCart($id_pro);
            $quantity = $this->cart->countCart($id);
            $totalPrice = $_POST['totalPrice'];
            $_SESSION['totalPrice'] = $totalPrice;
            return $this->render('cart.thongtindathang', compact('product', 'quantity', 'totalPrice', 'account' , 'ship'));
        }
        if(isset($_POST['checkVoucher'])){
            $id = $_SESSION['account'][0]->id;
            $account = $this->account->getAccount($id);
            $voucherPost = $_POST['voucher'];
            $checkVoucher = $this->cart->checkVoucher($voucherPost);
            // echo '<pre>';
            // print_r($checkVoucher);
            // die;
            $_SESSION['checkVoucher'] = $checkVoucher->id ?? '';

            if($checkVoucher){
                $voucher = $checkVoucher->valuevoucher;
                $id_voucher = $checkVoucher->id;
                $cart = $this->cart->getConfirmCart($_SESSION['postProduct']);
                $id = $_SESSION['account'][0]->id;
                $cart = $this->cart->cartInLogin($id);
                $pro = array_column($cart, 'id_pro');
                $id_pro = implode(",", $pro);
                $_SESSION['id_detailpro'] = $id_pro;
                $product = $this->cart->getProductCart($id_pro);
                $quantity = $this->cart->countCart($id);
                $totalPrice = (float) str_replace([".", " vnđ"], "", $_SESSION['totalPrice']);
                $ship = $this->cart->getAllShip();
                return $this->render('cart.thongtindathang', compact('product', 'quantity', 'totalPrice' , 'voucher', 'account' , 'ship' , 'id_voucher'));
            }
            else{
                $id = $_SESSION['account'][0]->id;
                $account = $this->account->getAccount($id);
                $cart = $this->cart->getConfirmCart($_SESSION['postProduct']);
                $id = $_SESSION['account'][0]->id;
                $cart = $this->cart->cartInLogin($id);
                $pro = array_column($cart, 'id_pro');
                $id_pro = implode(",", $pro);
                $_SESSION['id_detailpro'] = $id_pro;
                $product = $this->cart->getProductCart($id_pro);
                $quantity = $this->cart->countCart($id);
                $totalPrice = $_SESSION['totalPrice'];
                $text = "voucher không tồn tại hoặc đã hết lượt sử dụng";
                $ship = $this->cart->getAllShip();
                return $this->render('cart.thongtindathang', compact('product', 'quantity', 'totalPrice' , 'text', 'account', 'ship'));
            }
        }
        else{
            $id = $_SESSION['account'][0]->id;
            $account = $this->account->getAccount($id);
            $cart = $this->cart->getConfirmCart($_SESSION['postProduct']);
            $id = $_SESSION['account'][0]->id;
            $cart = $this->cart->cartInLogin($id);
            $pro = array_column($cart, 'id_pro');
            $id_pro = implode(",", $pro);
            $_SESSION['id_detailpro'] = $id_pro;
            $product = $this->cart->getProductCart($id_pro);
            $quantity = $this->cart->countCart($id);
            $countArray = [];
            $ProArrayy= [];
            
            foreach ($quantity as $object) {
                $countArray[] = $object->count;
                $ProArray[] = $object->id_pro;
            }
            $totalPrice = $_SESSION['totalPrice'];
            if(isset($_POST['dathang'])){
                $arrVoucher =$this->checkVoucher($_POST['voucher'],"không có voucher này");
                // 
                echo "<script>alert('voucher này không tồn tại')</script>";
                flash('','',);
                print_r($_POST);die;
                $id = $_SESSION['account'][0]->id;
                $address = $_SESSION['account'][0]->address;
                $phone = $_SESSION['account'][0]->phone;
                $cart = $this->cart->cartInLogin($id);
                $pro = array_column($cart, 'id_pro');
                $checkSpConLai = $this->cart->CheckProInShop($pro);
                $ship = $this->cart->getAllShip();
                foreach($checkSpConLai as $key=>$check){
                    if($check >= $_POST['quantity'][$key]){
                        //Xử lý insert:
                        //tính tiền:
                        $totalPriceString = $_POST['totalPrice'];
                        $totalPriceString = str_replace(".", "", $totalPriceString); // loại bỏ dấu chấm
                        $totalPriceString = str_replace(" vnđ", "", $totalPriceString); // loại bỏ " vnđ"
                        $totalPriceNumber = (int) $totalPriceString;
                        $getTimeOrder = date('Y-m-d H:i:s');
                        $id_acc = $_SESSION['account'][0]->id;
                        $id_voucher = $this->cart->checkVoucher($_POST['voucher']) ?? '';

                        $lastID = $this->cart->insertOrders($totalPriceNumber, $id_voucher->id ?? '' , $getTimeOrder , $id_acc , $_POST['ship']);
                        foreach($_SESSION['postProduct'] as $key=>$odd){
                            $this->cart->insertOderDetail($lastID , $_SESSION['id_detailpro'] , $_POST['quantity'][$key] , $_POST['note'][$key] , $address , $phone);
                            foreach($ProArray as $key=>$for){
                                $this->cart->checkSpBuy($for, $countArray[$key]);
                            }
                        }
                        // session_unset('totalPrice');
                        // session_unset('checkVoucher');
                        // session_unset('id_detailpro');
                        // session_unset('postProduct');
                        // session_unset('countCart');
                        
                        // tru vouche
                        $this->cart->truVoucher($_POST['voucher'] ?? '');
                        break;
                    }
                    else{
                        $checkFalse = [];
                        $checkFalse = "sản phẩm đã hết vui lòng chọn sản phẩm khác";
                        return $this->render('cart.thongtindathang', compact('product', 'quantity', 'totalPrice', 'account', 'checkFalse', 'ship'));
                    }
                }


                // $this->cart->quantityVoucher($_SESSION['checkVoucher']);

                //xong phần trừ số lượng sản phẩm khi đã mua
                //đặt hàng ỏ đây:
                

            }
            return $this->render('cart.thongtindathang', compact('product', 'quantity', 'totalPrice', 'account', 'ship'));
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
            return $this->render('cart.cart', compact('product', 'categorys', 'subCategorys'));
        }


    }

    public function checkVoucher($voucher, $mes){
        $checkVoucher = false;
        if($voucher == null || $this->cart->checkVoucher($voucher)){
            $checkVoucher = true;
        }
            return [
                'text' => $mes,
                'checkVoucher'=> $checkVoucher
            ];

    }
}

