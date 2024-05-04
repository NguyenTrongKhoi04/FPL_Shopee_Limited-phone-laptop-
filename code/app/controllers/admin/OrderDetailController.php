<?php

namespace App\Controllers\Admin;

use App\Models\Admin\OrderDetail;

class OrderDetailController extends BaseAdminController
{
    private $orderDetail;
    private $voucher;

    public function __construct()
    {
        $this->orderDetail = new OrderDetail();
    }

    public function detailOrder($id)
    {
        $arrField = [
            '*',
            'orderdetail.id AS orderdetail_id',
            'detailproduct.id AS detailproduct_id',
            'orderdetail.count AS orderdetail_count',
            'detailproduct.count AS detailproduct_count',
            'size.id AS size_id',
            'orders.id AS orders_id'
        ];
        $orderDetail = $this->orderDetail->getDetailOrder(($id), implode(',', $arrField));
        return $this->render('orderdetail.OrderDetail', compact('orderDetail'));
    }

    public function detailOrderRequestConfirm($id){
        $arrField = [
            '*',
            'orderdetail.id AS orderdetail_id',
            'detailproduct.id AS detailproduct_id',
            'orderdetail.count AS orderdetail_count',
            'detailproduct.count AS detailproduct_count',
            'size.id AS size_id',
            'orders.id AS orders_id'
        ];
        $orderDetail = $this->orderDetail->getDetailOrder(($id),implode(',',$arrField));
        return $this->render('orderdetail.OrderDetailRequestConfirm', compact('orderDetail'));
    }

    public function detailOrderConfirm($id)
    {
        $arrField = [
            '*',
            'orderdetail.id AS orderdetail_id',
            'detailproduct.id AS detailproduct_id',
            'orderdetail.count AS orderdetail_count',
            'detailproduct.count AS detailproduct_count',
            'size.id AS size_id',
            'orders.id AS orders_id'
        ];
        $orderDetail = $this->orderDetail->getDetailOrder(($id), implode(',', $arrField));
        return $this->render('orderdetail.OrderDetailConfirm', compact('orderDetail'));
    }
    
    public function detailOrderTransfer($id)
    {
        $arrField = [
            '*',
            'orderdetail.id AS orderdetail_id',
            'detailproduct.id AS detailproduct_id',
            'orderdetail.count AS orderdetail_count',
            'detailproduct.count AS detailproduct_count',
            'size.id AS size_id',
            'orders.id AS orders_id'
        ];
        $orderDetail = $this->orderDetail->getDetailOrder(($id), implode(',', $arrField));
        return $this->render('orderdetail.OrderDetailTransfer', compact('orderDetail'));
    }
    
    public function detailOrderSuccess($id)
    {
        $arrField = [
            '*',
            'orderdetail.id AS orderdetail_id',
            'detailproduct.id AS detailproduct_id',
            'orderdetail.count AS orderdetail_count',
            'detailproduct.count AS detailproduct_count',
            'size.id AS size_id',
            'orders.id AS orders_id'
        ];
        $orderDetail = $this->orderDetail->getDetailOrder(($id), implode(',', $arrField));
        return $this->render('orderdetail.OrderDetailSuccess', compact('orderDetail'));
    }

    public function detailOrderReject($id)
    {
        $arrField = [
            '*',
            'orderdetail.id AS orderdetail_id',
            'detailproduct.id AS detailproduct_id',
            'orderdetail.count AS orderdetail_count',
            'detailproduct.count AS detailproduct_count',
            'size.id AS size_id',
            'orders.id AS orders_id'
        ];
        $orderDetail = $this->orderDetail->getDetailOrder(($id), implode(',', $arrField));
        return $this->render('orderdetail.OrderDetailReject', compact('orderDetail'));
    }
    
    public function detailOrderReturn($id)
    {
        $arrField = [
            '*',
            'orderdetail.id AS orderdetail_id',
            'detailproduct.id AS detailproduct_id',
            'orderdetail.count AS orderdetail_count',
            'detailproduct.count AS detailproduct_count',
            'size.id AS size_id',
            'orders.id AS orders_id'
        ];
        $orderDetail = $this->orderDetail->getDetailOrder(($id), implode(',', $arrField));
        return $this->render('orderdetail.OrderDetailReturn', compact('orderDetail'));
    }
}