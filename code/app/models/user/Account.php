<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Account extends BaseModel
{
    protected $item = "account";
    public function checkAccount($gmail, $password)
    {
        $sql = "SELECT * from $this->item where gmail = '$gmail' and password ='$password'";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addAccount($gmail, $password, $username, $birthday, $address)
    {
        $sql = "INSERT INTO $this->item(gmail,password,username,birthday,address) Values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$gmail, $password, $username, $birthday, $address]);
    }
    public function getAccount($id)
    {
        $sql = "SELECT * from $this->item where id = '$id'";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function updateAccount($username, $gmail, $birthday, $address, $phone,  $id)
    {
        $sql = "UPDATE account SET username=?, gmail=?, birthday =?, address=?, phone = ?  where id= ?";
        $this->setQuery($sql);
        return $this->execute([$username, $gmail, $birthday, $address, $phone,  $id]);
    }

    public function checkAccountGmail($gmail, $id = null)
    {
        if (!empty($id)) $notID = " AND id != $id ";
        $sql = "select * from $this->item WHERE gmail = ? " . $notID ?? '';
        $this->setQuery($sql);
        return $this->loadAllRows([$gmail]);
    }

    public function checkAccountUsername($username, $id = null)
    {
        if (!empty($id)) $notUsername = " AND id != $id ";
        $sql = "select * from $this->item WHERE username = ? " . $notUsername ?? '';
        $this->setQuery($sql);
        return $this->loadAllRows([$username]);
    }

    public function updateAccountPassword($password, $id)
    {
        $sql = "UPDATE account SET password = ?  where id = ?";
        $this->setQuery($sql);
        return $this->execute([$password, $id]);
    }

    public function checkAccountPassword($id, $password)
    {
        $sql = "select * from $this->item WHERE password = ? AND id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$password, $id]);
    }
}