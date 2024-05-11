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
        if (isset($_POST['update'])) {
            $id = $_SESSION['account'][0]->id;
            $username = $_POST['username'];
            $gmail = $_POST['gmail'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $newPassword = $_POST['newpassword'];
            $errors = [];
            if (empty($password)) {
                $errors['pass'] = "* Bạn phải nhập password";
            } else {
                if ($password != $_SESSION['account'][0]->password) {
                    $errors['pass'] = "* Bạn phải nhập đúng với mật khẩu";
                }
            }
            if (empty($username)) {
                $errors['username'] = "* Bạn phải nhập username";
            }
            if (empty($address)) {
                $errors['address'] = "* Bạn phải nhập địa chỉ";
            }
            if (count($errors) > 0) {
                // có lỗi
                // echo "<pre>";
                // var_dump($errors);
                // echo "</pre>";
                // die;
                $account = $this->account->getAccount($id);
                $_SESSION['account'][0] = $account;
                return $this->render('infomation_account', compact('errors', 'account'));
            } else {
                if (!empty($newPassword)) {
                    if ($password == $_SESSION['account'][0]->password) {
                        $updateAccount = $this->account->updateAccount($username, $gmail, $address, $newPassword, $id);
                        $account = $this->account->getAccount($id);
                        $_SESSION['account'][0] = $account;
                        // echo "<pre>";
                        // var_dump($_SESSION['account'][0]);
                        // echo "</pre>";
                        // die;
                        return $this->render('infomation_account', compact('account'));
                    }
                }
                if (empty($newPassword)) {
                    if ($password == $_SESSION['account'][0]->password) {
                        // var_dump($password);
                        // die;
                        $this->account->updateAccount($username, $gmail, $address, $password, $id);
                        $account = $this->account->getAccount($id);
                        $_SESSION['account'][0] = $account;
                        return $this->render('infomation_account', compact('account'));
                    }
                }
            }
        }
    }
}