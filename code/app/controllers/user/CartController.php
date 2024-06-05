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
        //nếu bấm vào nút xóa:
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
                $selectedProducts = $_POST['selectedProduct'];
                foreach ($_SESSION['cart'] as $key => $value) {
                    foreach ($selectedProducts as $sl) {
                        if ($value['id'] == $sl) {
                            unset($_SESSION['cart'][$key]);
                        }
                    }
                }
            }
        }
        //ấn vào mua mục đã chọn:
        if (isset($_POST['muamucdachon'])) {
            $id = $_SESSION['account'][0]->id;
            $account = $this->account->getAccount($id);
            $cart = $this->cart->getConfirmCart($_POST['selectedProduct']);
            $_SESSION['postProduct'] = $_POST['selectedProduct'];
            $id = $_SESSION['account'][0]->id;
            $pro = array_column($cart, 'id_pro');
            $id_pro = implode(",", $pro);
            $_SESSION['id_detailpro'] = $id_pro;
            $ship = $this->cart->getAllShip();
            $product = $this->cart->getProductCart($id_pro);
            $quantity = $this->cart->countCart($id);
            $_SESSION['quantity'] = $quantity;
            $totalPrice = $_POST['totalPrice'];
            $_SESSION['totalPrice'] = $totalPrice;
            $trueQuantity = $_POST['quantity'];
            return $this->render('cart.thongtindathang', compact('product', 'quantity', 'totalPrice', 'account', 'ship', 'trueQuantity'));
        }


        //trang thông tin đặt hàng:
        else {

            //lấy các dữ liệu trong trang nếu có ấn vào xác nhận mua thì sẽ dùng để insert
            $id = $_SESSION['account'][0]->id;
            $account = $this->account->getAccount($id);
            $cart = $this->cart->getConfirmCart($_SESSION['postProduct']);
            $id = $_SESSION['account'][0]->id;
            $cart = $this->cart->cartInLogin($id);
            $product = $this->cart->getProductCart($_SESSION['id_detailpro']);
            $quantity = $this->cart->countCart($id);
            $countArray = [];
            $ProArrayy = [];

            foreach ($quantity as $object) {
                $countArray[] = $object->count;
                $ProArray[] = $object->id_pro;
            }
            $totalPrice = $_SESSION['totalPrice'];
            if (isset($_POST['dathang'])) {
                if ($_POST['voucher'] != "") {
                    $checkVoucher = $this->cart->checkVoucher($_POST['voucher']);
                    if ($checkVoucher) {
                        $voucher = $checkVoucher->valuevoucher;
                    } else {
                        $check = 'voucher không tông tại hoặc đã hết';
                        $products = $this->product->getProduct(10);
                        $categorys = $this->category->getCategory();
                        $subCategorys = $this->subCategory->getSubCategory();
                        return $this->render('product', compact('products', 'categorys', 'subCategorys', 'check'));
                    }
                }
                $id = $_SESSION['account'][0]->id;
                $address = $_SESSION['account'][0]->address;
                $phone = $_SESSION['account'][0]->phone;
                $cart = $this->cart->cartInLogin($id);
                $pro = array_column($cart, 'id_pro');
                $checkSpConLai = $this->cart->CheckProInShop($pro);
                $ship = $this->cart->getAllShip();
                foreach ($checkSpConLai as $key => $check) {
                    if ($check >= $_POST['quantity'][$key]) {
                        //Xử lý insert:
                        //tính tiền:
                        $totalPriceString = $_POST['totalPrice'];
                        $totalPriceString = str_replace(".", "", $totalPriceString); // loại bỏ dấu chấm
                        $totalPriceString = str_replace(" vnđ", "", $totalPriceString); // loại bỏ " vnđ"
                        if (isset($voucher)) {
                            $totalPriceNumber = (int) $totalPriceString - $voucher;
                        } else {
                            $totalPriceNumber = (int) $totalPriceString;
                        }
                        $getTimeOrder = date('Y-m-d H:i:s');
                        $id_acc = $_SESSION['account'][0]->id;
                        $id_voucher = $this->cart->checkVoucher($_POST['voucher']) ?? '';
                        // if(preg_match('/^0\d{9}$/', intval($_POST['phone']))) {
                        //     echo "Đúng";
                        //     die;
                        // }
                        
                        //insert 2 bảng order:
                        $lastID = $this->cart->insertOrders($totalPriceNumber, $id_voucher->id ?? '', $getTimeOrder, $id_acc, $_POST['ship']);
                        foreach ($_SESSION['postProduct'] as $key => $odd) {
                            $this->cart->insertOderDetail($lastID, $_SESSION['id_detailpro'], $_POST['quantity'][$key], $_POST['note'][$key], $_POST['address'], $_POST['phone']);
                            foreach ($ProArray as $key => $for) {
                                $this->cart->checkSpBuy($for, $countArray[$key]);
                            }
                        }

                        //xóa các session không cần thiết và xóa cart sau khi đặt thành công:
                        $this->cart->deleteCartAfterBuy($id_acc);
                        // giảm voucher sau khi đặt hàng:
                        $this->cart->truVoucher($_POST['voucher'] ?? '');

                        unset($_SESSION['totalPrice']);
                        unset($_SESSION['checkVoucher']);
                        unset($_SESSION['id_detailpro']);
                        unset($_SESSION['postProduct']);
                        //sau khi insert thành công, chuyển sang trang inđex:
                        $check = 'đặt hàng thành công';
                        $products = $this->product->getProduct(10);
                        $categorys = $this->category->getCategory();
                        $subCategorys = $this->subCategory->getSubCategory();
                        return $this->render('product', compact('products', 'categorys', 'subCategorys', 'check'));

                        break;
                    } else {
                        $checkFalse = [];
                        $checkFalse = "sản phẩm đã hết vui lòng chọn sản phẩm khác";
                        echo $checkFalse;
                        die;
                        // return $this->render('cart.thongtindathang', compact('product', 'quantity', 'totalPrice', 'account', 'checkFalse', 'ship'));
                    }
                }
            }
            return $this->render('cart.thongtindathang', compact('product', 'quantity', 'totalPrice', 'account', 'ship'));
        }


        //check có sản phẩm nào trong giỏ hàng chưa, nếu chưa có chuyển sang index:
        if (empty($_SESSION['cart'])) {
            $products = $this->product->getProduct(10);
            $categorys = $this->category->getCategory();
            $subCategorys = $this->subCategory->getSubCategory();
            $check = "Chưa có sản phẩm nào trong giỏ hàng";
            return $this->render('product', compact('products', 'categorys', 'subCategorys', 'check'));
        }
        //nếu có sản phẩm trong giỏ hàng thì được phép vào giỏ hàng:
        else {
            $product = $this->product->getProductCart();
            $categorys = $this->category->getCategory();
            $subCategorys = $this->subCategory->getSubCategory();
            return $this->render('cart.cart', compact('product', 'categorys', 'subCategorys'));
        }
    }

    // public function checkVoucher($voucher, $mes)
    // {
    //     $checkVoucher = false;
    //     if ($voucher == null || $this->cart->checkVoucher($voucher)) {
    //         $checkVoucher = true;
    //     }
    //     return [
    //         'text' => $mes,
    //         'checkVoucher' => $checkVoucher
    //     ];
    // }

    public function insertSession()
    {
        if (isset($_POST['submit'])) {

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $cart) {
                    print_r($cart['id'][$key]);

                    $cart['id'][$key] == $_POST['option'];
                    $cart['quantity'][$key] = $cart['quantity'][$key] + $_POST['quantity'];
                }
            }
            if (empty($_SESSION["cart"])) {
                $_SESSION["cart"] = array();
            }
            $item = array(
                "id" => intval($_POST["option"]),
                "quantity" => intval($_POST["quantity"])
            );

            $flag = false;

            foreach ($_SESSION['cart'] as $key => $cart) {
                if ($_POST['option'] == $cart['id']) {
                    $flag = true;
                    $_SESSION['cart'][$key]['quantity'] = $cart['quantity'] + intval($_POST['quantity']);
                }
            }
            ($flag) ? null : ($_SESSION["cart"][] = $item);
            echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';
            header('location: cart');

            if (isset($_SESSION['account'])) {
                header('location: addCart');
            }
        }
    }
}
