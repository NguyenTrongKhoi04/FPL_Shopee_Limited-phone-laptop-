<?php

namespace App\Controllers\Admin;

use App\Models\StoreProduct;
use App\Models\Account;

class AdminController extends BaseAdminController
{
    public $product;
    public $account;
    public function __construct()
    {
        $this->product = new StoreProduct();
        $this->account = new Account();
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
    public function listStorepro()
    {
        $products = $this->product->listStorepro();
        $subcategory = $this->product->getSubAllCategory();
        $storedetaiproduct = $this->product->getStoreDetailProduct();
        $size = $this->product->getSize();
        $cate = $this->product->getCategory();
        $countpro = $this->product->getCountStoreDetailProduct();
        return $this->render('Products.listStorepro', compact('products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
    }
    public function updateDetailStoreProducts($id)
    {
        if (isset($_POST['btn-submit'])) {

            $this->product->updateDetailStoreProduct($id, $_POST['image'], $_POST['price'], $_POST['size'], $_POST['count']);
            $check = 'update thành công';
            $products = $this->product->listStorepro();
            $subcategory = $this->product->getSubAllCategory();
            $storedetaiproduct = $this->product->getStoreDetailProduct();
            $size = $this->product->getSize();
            $cate = $this->product->getCategory();
            $countpro = $this->product->getCountStoreDetailProduct();
            $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
        } else {
            echo "lỗi";
        }
    }

    public function updateStoreProducts($id)
    {
        if (isset($_POST['btn-submit'])) {
            $datepro = date("Y-m-d");
            $this->product->updateStoreProduct($id, $_POST['name_pro'], $_POST['quantity'], $datepro, $_POST['id_subcategory'], $_POST['description']);
            $check = 'update thành công';
            $products = $this->product->listStorepro();
            $subcategory = $this->product->getSubAllCategory();
            $storedetaiproduct = $this->product->getStoreDetailProduct();
            $size = $this->product->getSize();
            $cate = $this->product->getCategory();
            $countpro = $this->product->getCountStoreDetailProduct();
            $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
        } else {
            echo "lỗi";
        }
    }

    public function addStorepro()
    {
        if (isset($_POST['btn-submit'])) {
            if (empty($_POST['name_pro'])) {
                $error[] = 'vui long nhap ten';
            }
            if (empty($_POST['quantity'])) {
                $error[] = 'vui long nhap số lượng';
            }
            if (empty($_POST['id_subcategory'])) {
                $error[] = 'vui long chọn loại';
            }
            if (empty($_POST['description'])) {
                $error[] = 'vui long nhap mo ta';
            }
            if (count($error) > 0) {
                $check = 'xem lại các dữ liệu nhập vào';
                $products = $this->product->listStorepro();
                $subcategory = $this->product->getSubAllCategory();
                $storedetaiproduct = $this->product->getStoreDetailProduct();
                $size = $this->product->getSize();
                $cate = $this->product->getCategory();
                $countpro = $this->product->getCountStoreDetailProduct();
                $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
            } else {

                $datepro = date("Y-m-d");
                $this->product->addStoreProduct($_POST['name_pro'], $_POST['quantity'], $datepro, $_POST['id_subcategory'], $_POST['description']);
                $check = 'thêm thành công';
                $products = $this->product->listStorepro();
                $subcategory = $this->product->getSubAllCategory();
                $storedetaiproduct = $this->product->getStoreDetailProduct();
                $size = $this->product->getSize();
                $cate = $this->product->getCategory();
                $countpro = $this->product->getCountStoreDetailProduct();
                $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
            }
        }
    }

    
    public function deleteStoreProduct($id)
    {
        $this->product->deleteStoreProduct($id);
        $check = 'xóa thành công';
        $products = $this->product->listStorepro();
        $subcategory = $this->product->getSubAllCategory();
        $storedetaiproduct = $this->product->getStoreDetailProduct();
        $size = $this->product->getSize();
        $cate = $this->product->getCategory();
        $countpro = $this->product->getCountStoreDetailProduct();
        $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
    }

    public function addSubCategory()
    {
        if (isset($_POST['btn-submitadd'])) {
            $this->product->addSubCate($_POST['name_subcate'], $_POST['id_category']);
            $check = 'thêm thành công';
            $products = $this->product->listStorepro();
            $subcategory = $this->product->getSubAllCategory();
            $storedetaiproduct = $this->product->getStoreDetailProduct();
            $size = $this->product->getSize();
            $cate = $this->product->getCategory();
            $countpro = $this->product->getCountStoreDetailProduct();
            $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
        }
    }
    // quản lý cate:
    public function deleteSubcate($id)
    {
        $this->product->deleteSubcate($id);
        $check = 'xóa thành công dannh mục';
        $products = $this->product->listStorepro();
        $subcategory = $this->product->getSubAllCategory();
        $storedetaiproduct = $this->product->getStoreDetailProduct();
        $size = $this->product->getSize();
        $cate = $this->product->getCategory();
        $countpro = $this->product->getCountStoreDetailProduct();
        $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
    }

    public function detailSubcate($id)
    {
        $subcategory = $this->product->getSubAllCategory();
        $cate = $this->product->getCategory();
        $oneSub = $this->product->get1Subcategory($id);
        $this->render('Products.detailSubcate', compact('oneSub', 'subcategory', 'cate'));
    }

    public function updateSubcate($id)
    {
        if (isset($_POST['btn-submit'])) {
            $this->product->updateSubcate($id, $_POST['name_subcate'], $_POST['id_category']);
            $check = 'sửa thành công';
            $products = $this->product->listStorepro();
            $subcategory = $this->product->getSubAllCategory();
            $storedetaiproduct = $this->product->getStoreDetailProduct();
            $size = $this->product->getSize();
            $cate = $this->product->getCategory();
            $countpro = $this->product->getCountStoreDetailProduct();
            $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
        }
    }




    //Up lên Cửa Hàng:
    public function upToShop()
    {
        $cate = $this->product->getCategory();
        $subcate = $this->product->getSubAllCategory();
        $products = $this->product->listStorepro();

        // $cate1 = $this->product->getUpToShop1();
        // $cate2 = $this->product->getUpToShop2();
        $this->render('Products.upToShop', compact('cate', 'subcate', 'products'));
    }

    public function upToShopSc($id)
    {
        $subcate = $this->product->getSubAllCategory();
        $alldetail = $this->product->getStoreDetailProduct();
        $cate = $this->product->getCategory();
        $oneproduct = $this->product->getOneProduct($id);
        $this->render('Products.upToShopSc', compact('subcate', 'cate', 'oneproduct', 'alldetail'));
    }
    
    public function submitUp()
    {
        if (isset($_POST['btn-submit'])) {
            // foreach($_POST as $key=>$value){
            //     // $newArr = [$_POST[$key][$key],$_POST['id_detail'][$key]];
            //     // $arr[]= $newArr;
                unset($_POST['btn-submit']);
            $arr = [];

            $count = count($_POST['id_pro']);
            for ($i = 0; $i < $count; $i++) {
                $subArray = [];
                foreach ($_POST as $key => $value) {
                    $subArray[] = $_POST[$key][$i];
                }
                $arr[] = $subArray;
            }
            // $this->product->UpProduct(2);
            $arr2 = [...$arr];
            echo '<pre>';
            print_r($arr2);
            // print_r($_POST);            
            die;
            
            // $id_pro = $_POST['id_pro'];
            // $id_detail = $_POST['id_detail'];
            // $price = $_POST['price'];
            // $image = $_POST['image'];
            // $size = $_POST['size'];
            // $count = $_POST['quantity'];
            // for($i = 0 ; $i<= $count; $i++){
            //     if($id_pro[$i] == $id_pro[$i+1]){
            //         echo "ninhninh";
            //     }
            // }
            foreach($arr as $i){
                $this->product->doneUpToShop($id_pro[$i]); // TODO: lấy bản sao và insert vào pro sàn
                $id1 = $this->product->loadID(); // TODO : lấy id mới tạo
                $this->product->doneUpdetai($id1, $image[$i], $price[$i], $size[$i], $count[$i]);
            }
            for ($i = 0; $i < count($id_detail); $i++) {
            
            }
            
            $subcate = $this->product->getSubAllCategory();
            $alldetail = $this->product->getStoreDetailProduct();
            $cate = $this->product->getCategory();
            // $oneproduct = $this->product->getOneProduct($id_pro);
            
            // $check = "đưa sản phẩm lên kho thành công";
            // $this->render('Products.upToShopSc', compact('subcate', 'cate', 'oneproduct', 'alldetail', 'check'));
            
        }
    }

    // public function Test(){
    //     $this->product->Test();
    // }

    public function listAccount(){
        $account = $this->account->listAccount();
        $this->render('Accounts.listAccount', compact('account'));
    }

    public function deleteAccount($id){
        $this->account->deleteAccount($id);
        $check = "xóa thành công tài khoản";
        $account = $this->account->listAccount();
        $this->render('Accounts.listAccount', compact('account', 'check'));
    }

    public function addAccount(){
        $error = [];
        if (isset($_POST['btn-submit'])) {
            if (empty($_POST['gmail'])) {
                $error[] = 'vui long nhap email';
            }
            if (empty($_POST['username'])) {
                $error[] = 'vui long nhap username';
            }
            if (empty($_POST['password'])) {
                $error[] = 'vui long chọn loại';
            }
            if (empty($_POST['birthday'])) {
                $error[] = 'vui long nhap mo ta';
            }
            if (empty($_POST['address'])) {
                $error[] = 'vui long nhap mo ta';
            }
            if (count($error) > 0) {
                $check = 'xem lại các dữ liệu nhập vào';
                $account = $this->account->listAccount();
                $this->render('Accounts.listAccount', compact('account', 'check'));
            }
            else{
                $createtime = date("Y-m-d h:i:s");
                $this->account->addAccount($_POST['gmail'], $_POST['username'], $_POST['password'], 1, $createtime, $_POST['birthday'] , $_POST['address'], $_POST['phone']);
                $check = "thêm thành công";
                $account = $this->account->listAccount();
                $this->render('Accounts.listAccount', compact('account', 'check'));
            }
        }
    }

}