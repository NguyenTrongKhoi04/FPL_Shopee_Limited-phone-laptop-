<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Voucher;

class VoucherController extends BaseAdminController
{
    private $voucher;

    public function __construct()
    {
        $this->voucher = new Voucher();
    }

    public function listVoucher()
    {
        $allVoucher = $this->voucher->getVoucher(" * ");
        return $this->render('voucher.ListVoucher', compact("allVoucher"));
    }

    public function addVoucherUI(){
        return $this->render('voucher.AddVoucher');
    }

    public function addVoucher()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die;
        extract($_POST);
        //        echo"<pre>";
        // print_r($_POST);
        // echo"</pre>";die;
        $flagErrors = false;
        $error = [];
        if ($namevoucher == null) {
            $flagErrors = true;
            $error['namevoucher'] = "nhập tên voucher";
        }
        if ($valuevoucher > 100 || $valuevoucher < 0) {
            $flagErrors = true;
            $error['valuevoucher'] = "nhập giá trị voucher trong khoảng 0-100%";
        }
        if ($countvoucher <= 0) {
            $flagErrors = true;
            $error['countvoucher'] = "nhập só lượng lớn hơn 0";
        }
        if ($flagErrors == false) {
            $codevoucher = $this->RandomString(20);
            var_dump($codevoucher);die;
            $check = $this->voucher->addVoucher("", $codevoucher, $namevoucher, $valuevoucher, $countvoucher);
            if ($check) {
                $mes = "Thêm thành công";
                flash('success', $mes, 'addVoucher');
            }
        } else {
            return $this->render('voucher.AddVoucher', compact("error"));
        }
        return $this->render('sale.AddSale');
    }

    function RandomString($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+{}|:<>?-=[];,./';
        $randomString = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $max)];
        }

        return $randomString;
    }

    public function stopVoucher($id)
    {
        $this->voucher->stopVoucher($id);
        flash('success', 'ban da xóa thanh cong', 'listVoucher');
    }
}