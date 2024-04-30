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
    public function updateAccount($username, $gmail, $address, $password, $id)
    {
        $sql = "UPDATE account SET username=?,gmail=?,address=?,password=? where id= ?";
        $this->setQuery($sql);
        return $this->execute([$username, $gmail, $address, $password, $id]);
    }
}
