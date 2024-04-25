<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Order;
use App\Models\Admin\Voucher;

class OrderController extends BaseAdminController
{
    private $order;
    private $voucher;

    public function __construct()
    {
        $this->order = new Order();// obj class model order
        $this->voucher = new Voucher();// obj class model voucher
    }

    public function listRequestConfirm()
    {
        $listVoucher = $this->voucher->getVoucher('*');
        $listOrder = $this->order->getOrderRequestConfirm(" *,orders.id AS order_id, COUNT(DISTINCT orderdetail.comment) AS countcomment");
        return $this->render('order.ListOrderRequestConfirm',compact('listOrder', 'listVoucher'));
    } 

    public function detailOrder($id){
        $orderDetail = $this->order->getDetailOrder(($id),"*");
        return $this->render('order.OrderDetail', compact('orderDetai'));
    }
    
}