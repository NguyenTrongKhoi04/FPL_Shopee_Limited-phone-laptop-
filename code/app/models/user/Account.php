<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Account extends BaseModel
{
    protected $item = "account";
    public function getAccount()
    {
        $sql = "SELECT * from $this->item";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function Addaccount($gmail, $password, $username, $address)
    {
        $sql = "INSERT INTO $this->item('gmail','password','username','address') Values('$gmail','$password','$username','$address')";
        $this->setQuery($sql);
        return $this->execute();
    }
}
