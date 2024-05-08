<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ReasonReject;

class ReasonRejectController extends BaseAdminController
{
    private $reasonReject;
    
    public function __construct()
    {
        $this->reasonReject = new ReasonReject();
    }

    public function listReasonReject(){
        $allReasonReject = $this->reasonReject->getReasonReject(' * ');
        
        return $this->render('reason_reject.ListReasonReject', compact('allReasonReject'));
    }

    public function addReasonRejectUI()
    {
        return $this->render('reason_reject.AddReasonReject');
    }
    
    public function addReasonReject()
    {
        extract($_POST);
        //        echo"<pre>";
        // print_r($_POST);
        // echo"</pre>";die;
        $flagErrors = false;
        $error = [];
        if ($name == null) {
            $flagErrors = true;
            $error['name'] = "nhập lý do";
        }

        if (!empty($this->reasonReject->checkReasonRejectName(" * ", $name))) {
            $flagErrors = true;
            $error['name'] = "lý do đã tồn tại";
        }
        
        if ($flagErrors == false) {
            $check = $this->reasonReject->addReasonReject("", $name);
            if ($check) {
                $mes = "Thêm thành công";
                flash('success', $mes, 'addReasonReject');
            }
        }
        return $this->render('reason_reject.AddReasonReject', compact("error"));
    }

    public function deleteReasonReject($id)
    {
        $check = $this->reasonReject->checkReason("orders", $id);
        if($check != null ){
            $mes = "Xóa k thành công vì lý do đã được sử dụng trong đơn hàng, hóa đơn";
            flash('success', $mes, 'listReasonReject');
        }
        $this->reasonReject->deleteReasonReject($id);
        flash('success', 'ban da xóa thanh cong', 'listReasonReject');
    }
}