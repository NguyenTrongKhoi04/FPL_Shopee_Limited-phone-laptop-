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
    public function addAccount($gmail, $password, $username, $address)
    {
        $sql = "INSERT INTO $this->item('gmail','password','username','address') Values('$gmail','$password','$username','$address')";
        $this->setQuery($sql);
        return $this->execute();
    }
}
