<?php

namespace App\Controllers\Staff;

use App\Models\Admin\Product;
use App\Models\Admin\Ship;
use App\Models\Admin\Staff;
use App\Models\Admin\Account;
use App\Models\Admin\Voucher;

class StaffController extends BaseStaffController
{
    private $product, $ship, $staff, $voucher, $account;
    public function __construct()
    {
        $this->product = new Product();
        $this->ship = new Ship();
        $this->staff = new Staff();
        $this->voucher = new Voucher;
        $this->account = new Account;
    }

    public function index($post = null, $errors = null)
    {
        $ship = $this->ship->getShip('*');
        $products = $this->product->getProductCount();

        return $this->render('order.index', compact('products', 'ship', 'post', 'errors'));
    }

    public function confirmDetail()
    {
        extract($_POST);
        $post = $_POST;
        $errors = [];

        if (empty($this->account->checkAccountGmail($gmail))) {
            $errors['gmail'] = "Gmail này không tồn tại";
        }

        if (!preg_match('/^0\d{9}$/', $phone)) {
            $errors['phone'] = "Nhập sai định dạng số điện thoại";
        }

        $requiredFields = [
            'gmail' => "nhập gmail",
            'phone' => "nhập số điện thoại",
            'address' => "nhập địa chỉ",
            'id_ship' => "mã ship không hợp lệ"
        ];

        foreach ($requiredFields as $field => $errorMessage) {
            if (empty($$field)) {
                $errors[$field] = $errorMessage;
            }
        };

        if (!empty($errors)) {
            return $this->index($post, $errors);
        }

        $detailProduct = $this->product->getDetailById_Product($id_product);
        $ship = $this->ship->getShip('*');
        $product = $this->product->getDetailProduct($id_product); // ! ghi sai tên hàm, hàm lấy pro từ id

        return $this->render('order.DetailConfirm', compact('product', 'detailProduct', 'post', 'ship'));
    }

    public function order()
    {
        extract($_POST);
        if (isset($back) && $back) {
            return $this->back($_POST);
        }

        $lastID = $this->addOrder($_POST);

        $this->staff->insertOrderDetail_ByStaff($lastID, $id_product, $count, $comment, $address, $phone);
        echo "<script>alert('Thêm đơn hàng thành công')</script>";
        flash('', '', 'staff_Product');
    }

    public function back($post)
    {
        extract($post);
        return $this->index($post);
    }

    public function addOrder($post)
    {
        extract($post);

        $detail = $this->product->getDetailById($id_detail);
        $voucher = $this->voucher->checkVoucher($codevoucher);
        $id_voucher = (empty($voucher)) ? NULL : $voucher[0]->id;
        $saleVoucher = (empty($voucher)) ? 0 : $voucher[0]->valuevoucher;
        $product = $this->product->getDetailProduct($id_product);
        $valueSale = $this->product->getProductValueSale($id_product, "*")[0]->valuesale;

        // add order
        $totalOrder = ($detail[0]->price - ($detail[0]->price * $valueSale / 100)) * $count  - $saleVoucher;
        $id_account = $this->account->getAccount('id', "gmail = '$gmail'")[0]->id;

        return $this->staff->insertOrder_ByStaff($totalOrder, $id_voucher, $id_account, $id_ship);
    }

    public function addOrderDetail($lastID, $post)
    {
    }
}