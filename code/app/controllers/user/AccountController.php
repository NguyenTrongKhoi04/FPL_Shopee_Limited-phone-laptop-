<?php

namespace App\Controllers\User;

use App\Models\User\Account;


class AccountController extends BaseController
{
    public $account;

    public function __construct()
    {
        $this->account = new Account();
    }

    public function infoAccout($id)
    {
        if (empty($_SESSION['account'])) {
            return $this->render('login');
        }
        $account = $this->account->getAccount($id);
        // echo "<pre>";
        // var_dump($_SESSION['account'][0]);
        // echo "</pre>";
        // die;
        return $this->render('account.infomation_account', compact('account'));
    }

    public function changeInfoAccount()
    {        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            $errors = [];

            if (empty($username)) {
                $errors['username'] = "* Bạn phải nhập username";
            }
            if (empty($error['username']) && !empty($this->account->checkAccountUsername($username, $id))) {
                $error['username'] = "username này đã tồn tại";
            }

            if (empty($phone)) {
                $errors['phone'] = "* Bạn phải nhập số điện thoại";
            }

            if (empty($address)) {
                $errors['address'] = "* Bạn phải nhập địa chỉ";
            }

            if (!empty($phone) && !preg_match('/^0\d{9}$/', $phone)) {
                $error['phone'] = "sai định dạng só diện thoại";
            }

            if (!empty($birthday) && (strtotime($birthday) >= time())) {
                $error['birthday'] = "chọn lại ngày sinh";
            }

            if (count($errors) > 0) {
                $account = $this->account->getAccount($id);
                // $_SESSION['account'][0] = $account;
                return $this->render('account.infomation_account', compact('errors', 'account'));
            } else {
                $updateAccount = $this->account->updateAccount($username, $gmail, $birthday, $address, $phone,  $id);
                $account = $this->account->getAccount($id);
                $_SESSION['account'][0] = $account;
                // echo "<pre>";
                // var_dump($_SESSION['account'][0]);
                // echo "</pre>";
                // die;
                echo "<script>alert('Cập nhật thông tin thành công')</script>";
                return $this->render('account.infomation_account', compact('account'));
            }
        }
    }

    public function change_pass_UI()
    {
        return $this->render('account.change_password');
    }

    public function change_pass()
    {
        // echo "<pre>";
        //     //  var_dump($_SESSION);
        // print_r($_POST);die;
        extract($_POST);  
        $checkPassword = $this->account->checkAccountPassword($_SESSION['account'][0]->id, $password_old);
        
        if(!empty($update)){
            if($password_old == null){
                $errors['password_old'] = "Nhập mật khẩu hiện tại";
                return $this->render('account.change_password',compact('errors'));
            }
            
            if(empty($checkPassword)){
                $errors['password_old'] = "Nhập sai mật khẩu hiện tại";
                return $this->render('account.change_password',compact('errors'));
            }

            if ($password_new == null) {
                $errors['password_new'] = "Nhập mật khẩu mới";
                return $this->render('account.change_password', compact('errors'));
            }

            if($password_old == $password_new){
                $errors['password_new'] = "bạn nhập mật khẩu hiện tại";
                return $this->render('account.change_password', compact('errors'));
            }
            
            if($password_new_confirm == null){
                $errors['password_new_confirm'] = "Vui lòng nhập lại mật khẩu để xác nhận lại";
                return $this->render('account.change_password', compact('errors'));
            }

            if (empty($errors['password_new']) && ($password_new != $password_new_confirm)) {
                $errors['password_new_confirm'] = "Nhập xác nhận mật khẩu không giống với mật khẩu hiện tại";
                return $this->render('account.change_password', compact('errors'));
            }

            if(empty($errors)){
                $this->account->updateAccountPassword($password_new, $_SESSION['account'][0]->id);
                echo "<script>alert('Cập nhật mật khẩu thành công')</script>";
                flash('success', 'aa', 'info-acccount/' . $_SESSION['account'][0]->id);
            }
        }

        if (!empty($forgot_pass)) {
            
        }
    }
}