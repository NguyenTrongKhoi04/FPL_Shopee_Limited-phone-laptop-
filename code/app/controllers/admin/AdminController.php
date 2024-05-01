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
        $cate = $this->product->getCategory();
        $oneproduct = $this->product->getOneProduct($id);
        $this->render('Products.upToShopSc', compact('subcate', 'cate', 'oneproduct'));
    }
    public function doneUpToShop()
    {
        if (isset($_POST['btn-submit'])) {
            $arrayOfObjects = json_decode($_POST['arrayOfArrays'], true);

            // Duyệt qua mảng arrayOfObjects và thực hiện câu lệnh insert cho mỗi đối tượng
            foreach ($arrayOfObjects as $object) {
                $id = $object['id'];
                $name_pro = $object['name_pro'];
                $quantity = $object['quantity'];
                $datepro = $object['datepro'];
                $id_subcategory = $object['id_subcategory'];
                $description = $object['description'];
            }
            $this->product->doneUpToShop($name_pro, $quantity, $datepro, $id_subcategory, $description);
            $check = "đưa sản phẩm lên kho thành công";
            $id_subcategory = $object['id_subcategory'];
            $cate = $this->product->getCategory();
            $subcate = $this->product->getSubAllCategory();
            $products = $this->product->listStorepro();
            $detailPro = $this->product->getDetailStoreProduct($id_subcategory);
            $this->render('Products.upDetailToShop', compact('check','cate', 'subcate', 'products', 'id_subcategory', 'detailPro'));
            
        }
    }


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
    public function submitUp(){

    }
}
