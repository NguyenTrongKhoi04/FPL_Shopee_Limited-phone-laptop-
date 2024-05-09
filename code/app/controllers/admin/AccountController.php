<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Account;

class AccountController extends BaseAdminController
{
    private $acc;
    
    public function __construct()
    {
        $this->acc = new Account();
    }

    public function listAccount(){
        $allAcc = $this->acc->getAccount(' * ');
        
        return $this->render('account.ListAccount', compact("allAcc"));
    }

    public function addAccountUI()
    {
        return $this->render('account.AddAccount');
    }
    
    public function addAccount()
    {
        extract($_POST);
        //        echo"<pre>";
        // print_r($_POST);
        // echo"</pre>";
        // die;
        $flagErrors = false;
        $error = [];
        if($gmail == null){
            $flagErrors = true;
            $error['gmail'] = "không được để trống gmail";
        }
        
        if(empty($error['gmail']) && !filter_var($gmail, FILTER_VALIDATE_EMAIL)){
            $flagErrors = true;
            $error['gmail'] = "nhập đúng định dạng gmail";
        }

        if(empty($error['gmail']) && !empty($this->acc->checkAccountGmail($gmail))){
            $flagErrors = true;
            $error['gmail'] = "Gmail này đã tồn tại";
        }
        
        if ($username == null) {
            $flagErrors = true;
            $error['username'] = "không được để trống username";
        }

        if (empty($error['username']) && !empty($this->acc->checkAccountUsername($username))) {
            $flagErrors = true;
            $error['username'] = "Username này đã tồn tại";
        }

        if ($password == null) {
            $flagErrors = true;
            $error['password'] = "không được để trống password";
        }
        
        if($role != 1 && $role != 0){
            $flagErrors = true;
            $error['role'] = "sai dữ liệu role";    
        }
        
        if( !empty($phone) &&!preg_match('/^0\d{9}$/', $phone)){
            $flagErrors = true;
            $error['phone'] = "sai định dạng só diện thoại";    
        }
        
        if( !empty($birthday) && (strtotime($birthday) >= strtotime(time()))){
            $flagErrors = true;
            $error['birthday'] = "chọn lại ngày sinh";    
        }
        
        if($flagErrors == false){
            $check = $this->acc->addAccount("", $gmail, $username, $password, $role, $birthday, $address, $phone);
            if ($check) {
                $mes = "Thêm thành công";
                flash('success', $mes, 'addAccount');
            }
        }
            return $this->render('account.AddAccount',compact("error"));
        }

        
    public function updateAccountUI($id){
        $oneAccount = $this->acc->getOneAccount(' * ',$id);
        return $this->render('account.UpdateAccount',compact('oneAccount'));
    }   
    
    public function updateAccount($id){
        extract($_POST);
        //        echo"<pre>";
        // print_r($_POST);
        // echo"</pre>";
        // die;
        $flagErrors = false;
        $error = [];
        if ($gmail == null) {
            $flagErrors = true;
            $error['gmail'] = "không được để trống gmail";
        }

        if (empty($error['gmail']) && !filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
            $flagErrors = true;
            $error['gmail'] = "nhập đúng định dạng gmail";
        }

        if (empty($error['gmail']) && !empty($this->acc->checkAccountGmail($gmail, $id))) {
            $flagErrors = true;
            $error['gmail'] = "Gmail này đã tồn tại";
        }

        if ($username == null) {
            $flagErrors = true;
            $error['username'] = "không được để trống username";
        }

        if (empty($error['username']) && !empty($this->acc->checkAccountUsername($username,$id))) {
            $flagErrors = true;
            $error['username'] = "Username này đã tồn tại";
        }

        if ($password == null) {
            $flagErrors = true;
            $error['password'] = "không được để trống password";
        }

        if ($role != 1 && $role != 0) {
            $flagErrors = true;
            $error['role'] = "sai dữ liệu role";
        }

        if (!empty($phone) && !preg_match('/^0\d{9}$/', $phone)) {
            $flagErrors = true;
            $error['phone'] = "sai định dạng só diện thoại";
        }

        if($birthday == null){
            $flagErrors = true;
            $error['birthday'] = "Không được để trống ngày sinh";
        }

        if (!empty($error['birthday']) && (strtotime($birthday) >= strtotime(time()))) {
            $flagErrors = true;
            $error['birthday'] = "chọn lại ngày sinh";
        }

        if ($flagErrors == false) {
            $check = $this->acc->updateOneAccount($id, $gmail, $username, $password, $role, $birthday, $address, $phone);
            if ($check) {
                $mes = "Thêm thành công";
                $oneAccount = $this->acc->getOneAccount(' * ', $id);
                return $this->render('account.UpdateAccount', compact("error", "oneAccount", "mes"));
            }
        }
        // echo "<pre>";
        // print_r($error);die;
        $oneAccount = $this->acc->getOneAccount(' * ', $id);
        return $this->render('account.UpdateAccount', compact("error","oneAccount"));
    }

    public function stopAccount($id)
    {
        $this->acc->stopAccount($id);
        flash('success', 'ban da dừng hoạt động account thanh cong', 'listAccount');
    }
    

}