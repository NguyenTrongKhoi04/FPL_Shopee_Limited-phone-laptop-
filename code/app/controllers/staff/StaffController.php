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

    public function index($post = null)
    {
        $ship = $this->ship->getShip('*');
        $products = $this->product->getProductCount();

        return $this->render('order.index', compact('products', 'ship', 'post'));
    }

    public function confirmDetail()
    {
        extract($_POST);
        $detailProduct = $this->product->getDetailById_Product($id_product);
        $ship = $this->ship->getShip('*');
        $product = $this->product->getDetailProduct($id_product); // ! ghi sai tên hàm, hàm lấy pro từ id
        $post = $_POST;
        return $this->render('order.DetailConfirm', compact('product', 'detailProduct', 'post', 'ship'));
    }

    public function order()
    {
        extract($_POST);
        $this->back($_POST);

        $lastID = $this->addOrder($_POST);

        $this->staff->insertOrderDetail_ByStaff($lastID, $id_product, $count, $comment, $address, $phone);
        echo "<script>alert('Thêm đơn hàng thành công')</script>";
        flash('', '', 'staff_Product');
    }

    public function back($post)
    {
        extract($post);
        if (isset($back) && $back) {
            return $this->index($post);
        }
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
