<?php

namespace App\Controllers\User;

use App\Models\User\Account;
use App\Models\User\Order;

class BillController extends BaseController
{
    public $account, $order;

    public function __construct()
    {

        $this->account = new Account();
        $this->order = new Order();
    }

    public function listBill()
    {
        $listShip = $this->order->listShip();
        $listStatusOrder = $this->order->listStatusOrder();
        $listVoucher = $this->order->listVoucher();
        $listReasonReject = $this->order->listReasonReject();
        $listBill = $this->order->listBill($_SESSION['account'][0]->id);
        // echo "<pre>";
        // print_r($listBill);
        // die;
        return $this->render('bill.list_bill', compact("listBill", "listShip", "listReasonReject", "listVoucher", "listStatusOrder"));
    }

    public function updateStatus()
    {
        extract($_POST);
        echo "<pre>";
        print_r($_POST);

        $statusUpdate = ($status == 4) ? '7' : '6';
        $this->order->updateStatusOrder($id, $statusUpdate, $reason_reject, $reason_text ?? null);
        flash('', '', 'listbill');
    }

    public function detailBill($id)
    {
        $listDetail = $this->order->getListDetail($id);
        $listShip = $this->order->listShip();
        return $this->render('bill.detail_bill', compact("listDetail", "listShip"));
    }
}
