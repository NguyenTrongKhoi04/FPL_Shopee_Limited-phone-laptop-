<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Order;
use App\Models\Admin\Voucher;
use App\Models\Admin\Status;
use App\Models\Admin\Account;
use App\Models\Admin\Ship;
use App\Models\Admin\ReasonReject;

class OrderController extends BaseAdminController
{
    private $order;
    private $voucher;
    private $status;
    private $account;
    private $ship;
    private $reasonReject;

    public function __construct()
    {
        $this->order = new Order(); // obj class model order
        $this->voucher = new Voucher(); // obj class model voucher
        $this->status = new Status();
        $this->account = new Account();
        $this->ship = new Ship();
        $this->reasonReject = new ReasonReject();
    }

    // private function totalOrderMenu(){
    //     $totalOrderRequestConfirm = $this->order->getTotalStatus(1, 'COUNT(status) AS count');
    //     $totalOrderConfirm = $this->order->getTotalStatus(2, 'COUNT(status) AS count');
    //     $totalOrderTransfer = $this->order->getTotalStatus(3, 'COUNT(status) AS count');
    //     $totalOrderSuccess = $this->order->getTotalStatus(4, 'COUNT(status) AS count');
    //     $totalOrderReturn = $this->order->getTotalStatus(7, 'COUNT(status) AS count');
    //     $totalOrderReject = $this->order->getTotalStatus(6, 'COUNT(status) AS count');
    //     $totalAllOrder = $this->order->getTotalStatus(null, 'COUNT(status) AS count');
    // }

    public function listRequestConfirm()
    {
        $arrField = [
            "*",
            "COUNT(orders.status) AS totalrequestconfirm",
            "orders.id AS order_id",
            "COUNT(CASE WHEN orderdetail.comment <> '' THEN 1 END) AS countcomment"
        ];
        $listVoucher = $this->voucher->getVoucher('*');
        $listShip = $this->ship->getShip('*');
        $listOrder = $this->order->getOrderRequestConfirm(join(', ', $arrField), 'orders.status = 1 ', "orders.id", "time_order");

        $totalAllOrder = $this->order->getTotalStatus(null, 'COUNT(status) AS count');
        $totalOrderConfirm = $this->order->getTotalStatus(2, 'COUNT(status) AS count');
        $totalOrderRequestConfirm = $this->order->getTotalStatus(1, 'COUNT(status) AS count');
        $totalOrderTransfer = $this->order->getTotalStatus(3, 'COUNT(status) AS count');
        $totalOrderSuccess = $this->order->getTotalStatus(4, 'COUNT(status) AS count');
        $totalOrderReturn = $this->order->getTotalStatus("7 OR status = 8", 'COUNT(status) AS count');
        $totalOrderReject = $this->order->getTotalStatus("6 OR status = 9", 'COUNT(status) AS count');

        return $this->render('order.ListOrderRequestConfirm', compact(
            "listOrder",
            "listVoucher",
            "listShip",

            "totalOrderRequestConfirm",
            "totalOrderConfirm",
            "totalOrderSuccess",
            "totalOrderTransfer",
            "totalOrderReturn",
            "totalOrderReject",
            "totalAllOrder"
        ));
    }

    public function listAllOrder()
    {

        $listOrder = $this->order->getOrder('*', '1', 'ORDER BY time_order');
        $listStatus = $this->status->getStatus('*');
        $listAccount = $this->account->getAccount('*');

        $totalAllOrder = $this->order->getTotalStatus(null, 'COUNT(status) AS count');
        $totalOrderConfirm = $this->order->getTotalStatus(2, 'COUNT(status) AS count');
        $totalOrderRequestConfirm = $this->order->getTotalStatus(1, 'COUNT(status) AS count');
        $totalOrderTransfer = $this->order->getTotalStatus(3, 'COUNT(status) AS count');
        $totalOrderSuccess = $this->order->getTotalStatus(4, 'COUNT(status) AS count');
        $totalOrderReturn = $this->order->getTotalStatus("7 OR status = 8", 'COUNT(status) AS count');
        $totalOrderReject = $this->order->getTotalStatus("6 OR status = 9", 'COUNT(status) AS count');

        return $this->render('order.listAllOrder', compact(
            "listAccount",
            "listStatus",
            "listOrder",
            "totalOrderRequestConfirm",
            "totalOrderConfirm",
            "totalOrderSuccess",
            "totalOrderTransfer",
            "totalOrderReturn",
            "totalOrderReject",
            "totalAllOrder"
        ));
    }

    public function listConfirm()
    {
        $arrField = [
            "*",
            "COUNT(orders.status) AS totalrequestconfirm",
            "orders.id AS order_id",
            "COUNT(DISTINCT orderdetail.comment) AS countcomment"
        ];

        $listVoucher = $this->voucher->getVoucher('*');
        $listShip = $this->ship->getShip('*');
        $listOrder = $this->order->getOrderConfirm(join(', ', $arrField), 'orders.status = 2', "orders.id", "time_order");

        $totalAllOrder = $this->order->getTotalStatus(null, 'COUNT(status) AS count');
        $totalOrderConfirm = $this->order->getTotalStatus(2, 'COUNT(status) AS count');
        $totalOrderRequestConfirm = $this->order->getTotalStatus(1, 'COUNT(status) AS count');
        $totalOrderTransfer = $this->order->getTotalStatus(3, 'COUNT(status) AS count');
        $totalOrderSuccess = $this->order->getTotalStatus(4, 'COUNT(status) AS count');
        $totalOrderReturn = $this->order->getTotalStatus("7 OR status = 8", 'COUNT(status) AS count');
        $totalOrderReject = $this->order->getTotalStatus("6 OR status = 9", 'COUNT(status) AS count');

        return $this->render('order.ListOrderConfirm', compact(
            "listOrder",
            "listVoucher",
            "listShip",

            "listVoucher",
            "totalOrderRequestConfirm",
            "totalOrderConfirm",
            "totalOrderSuccess",
            "totalOrderTransfer",
            "totalOrderReturn",
            "totalOrderReject",
            "totalAllOrder"
        ));
    }

    public function listTransfer()
    {
        $arrField = [
            "*",
            "COUNT(orders.status) AS totalrequestconfirm",
            "orders.id AS order_id",
            "COUNT(DISTINCT orderdetail.comment) AS countcomment"
        ];

        $listVoucher = $this->voucher->getVoucher('*');
        $listShip = $this->ship->getShip('*');
        $listOrder = $this->order->getOrderTransfer(join(', ', $arrField), 'orders.status = 3', "orders.id", "time_order");

        $totalAllOrder = $this->order->getTotalStatus(null, 'COUNT(status) AS count');
        $totalOrderConfirm = $this->order->getTotalStatus(2, 'COUNT(status) AS count');
        $totalOrderRequestConfirm = $this->order->getTotalStatus(1, 'COUNT(status) AS count');
        $totalOrderTransfer = $this->order->getTotalStatus(3, 'COUNT(status) AS count');
        $totalOrderSuccess = $this->order->getTotalStatus(4, 'COUNT(status) AS count');
        $totalOrderReturn = $this->order->getTotalStatus("7 OR status = 8", 'COUNT(status) AS count');
        $totalOrderReject = $this->order->getTotalStatus("6 OR status = 9", 'COUNT(status) AS count');
        return $this->render('order.ListOrderTransfer', compact(
            "listOrder",
            "listVoucher",
            "listShip",

            "listVoucher",
            "totalOrderRequestConfirm",
            "totalOrderConfirm",
            "totalOrderSuccess",
            "totalOrderTransfer",
            "totalOrderReturn",
            "totalOrderReject",
            "totalAllOrder"
        ));
    }

    public function listSuccess()
    {
        $arrField = [
            "*",
            "COUNT(orders.status) AS totalrequestconfirm",
            "orders.id AS order_id",
            "COUNT(DISTINCT orderdetail.comment) AS countcomment"
        ];

        $listVoucher = $this->voucher->getVoucher('*');
        $listShip = $this->ship->getShip('*');
        $listOrder = $this->order->getOrderSuccess(join(', ', $arrField), 'orders.status = 4', "orders.id", "time_order");

        $totalAllOrder = $this->order->getTotalStatus(null, 'COUNT(status) AS count');
        $totalOrderConfirm = $this->order->getTotalStatus(2, 'COUNT(status) AS count');
        $totalOrderRequestConfirm = $this->order->getTotalStatus(1, 'COUNT(status) AS count');
        $totalOrderTransfer = $this->order->getTotalStatus(3, 'COUNT(status) AS count');
        $totalOrderSuccess = $this->order->getTotalStatus(4, 'COUNT(status) AS count');
        $totalOrderReturn = $this->order->getTotalStatus("7 OR status = 8", 'COUNT(status) AS count');
        $totalOrderReject = $this->order->getTotalStatus("6 OR status = 9", 'COUNT(status) AS count');

        return $this->render('order.ListOrderSuccess', compact(
            "listOrder",
            "listVoucher",
            "listShip",

            "listVoucher",
            "totalOrderRequestConfirm",
            "totalOrderConfirm",
            "totalOrderSuccess",
            "totalOrderTransfer",
            "totalOrderReturn",
            "totalOrderReject",
            "totalAllOrder"
        ));
    }

    public function listReject()
    {
        $arrField = [
            "*",
            "COUNT(orders.status) AS totalrequestconfirm",
            "orders.id AS order_id",
            "COUNT(DISTINCT orderdetail.comment) AS countcomment"
        ];

        $listVoucher = $this->voucher->getVoucher('*');
        $listShip = $this->ship->getShip('*');
        $listReasonReject = $this->reasonReject->getReasonReject('*');
        $listOrder = $this->order->getOrderSuccess(join(', ', $arrField), 'orders.status = 9 OR orders.status = 6', "orders.id", "time_order");

        $totalAllOrder = $this->order->getTotalStatus(null, 'COUNT(status) AS count');
        $totalOrderConfirm = $this->order->getTotalStatus(2, 'COUNT(status) AS count');
        $totalOrderRequestConfirm = $this->order->getTotalStatus(1, 'COUNT(status) AS count');
        $totalOrderTransfer = $this->order->getTotalStatus(3, 'COUNT(status) AS count');
        $totalOrderSuccess = $this->order->getTotalStatus(4, 'COUNT(status) AS count');
        $totalOrderReturn = $this->order->getTotalStatus("7 OR status = 8", 'COUNT(status) AS count');
        $totalOrderReject = $this->order->getTotalStatus("6 OR status = 9", 'COUNT(status) AS count');

        return $this->render('order.ListOrderReject', compact(
            "listOrder",
            "listVoucher",
            "listShip",
            "listReasonReject",

            "listVoucher",
            "totalOrderRequestConfirm",
            "totalOrderConfirm",
            "totalOrderSuccess",
            "totalOrderTransfer",
            "totalOrderReturn",
            "totalOrderReject",
            "totalAllOrder"
        ));
    }

    public function listReturn()
    {
        $arrField = [
            "*",
            "COUNT(orders.status) AS totalrequestconfirm",
            "orders.id AS order_id",
            "COUNT(DISTINCT orderdetail.comment) AS countcomment"
        ];

        $listVoucher = $this->voucher->getVoucher('*');
        $listShip = $this->ship->getShip('*');
        $listReasonReturn = $this->reasonReject->getReasonReject('*');
        $listOrder = $this->order->getOrderSuccess(join(', ', $arrField), 'orders.status = 7 OR orders.status = 8', "orders.id", "time_order");

        $totalAllOrder = $this->order->getTotalStatus(null, 'COUNT(status) AS count');
        $totalOrderConfirm = $this->order->getTotalStatus(2, 'COUNT(status) AS count');
        $totalOrderRequestConfirm = $this->order->getTotalStatus(1, 'COUNT(status) AS count');
        $totalOrderTransfer = $this->order->getTotalStatus(3, 'COUNT(status) AS count');
        $totalOrderSuccess = $this->order->getTotalStatus(4, 'COUNT(status) AS count');
        $totalOrderReturn = $this->order->getTotalStatus("7 OR status = 8", 'COUNT(status) AS count');
        $totalOrderReject = $this->order->getTotalStatus("6 OR status = 9", 'COUNT(status) AS count');

        return $this->render('order.ListOrderReturn', compact(
            "listOrder",
            "listVoucher",
            "listShip",
            "listReasonReturn",

            "listVoucher",
            "totalOrderRequestConfirm",
            "totalOrderConfirm",
            "totalOrderSuccess",
            "totalOrderTransfer",
            "totalOrderReturn",
            "totalOrderReject",
            "totalAllOrder"
        ));
    }

    public function confirmOrder($id){
        $check = $this->order->updateStatusOrder(2,$id);
        if ($check) {
            flash('success', 'ban da sua thanh cong', 'listRequestConfirm');
        }
    }
    
    public function confirmCancelOrder($id){
        $check = $this->order->updateStatusOrder(9,$id);
       
        if ($check) {
            flash('success', 'ban da sua thanh cong', 'listRequestConfirm');
        }
    }

    public function confirmTransfer($id)
    {
        $check = $this->order->updateStatusOrder(3, $id);
        if ($check) {
            flash('success', 'ban da sua thanh cong', 'listConfirm');
        }
    }
    
    public function confirmReturn($id)
    {
        $check = $this->order->updateStatusOrder(8, $id);
        if ($check) {
            flash('success', 'ban da sua thanh cong', 'listReturn');
        }
    }
}