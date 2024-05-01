<?php
namespace App\Models;
class Account extends BaseModel {


    public function listAccount (){
        $sql = "select * from account";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function deleteAccount($id){
        $sql = "delete from account where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function addAccount($gmail , $username , $password, $role , $createtime, $birthday, $address, $phone){
        $sql = "INSERT INTO `account`( gmail, username, password, role, createtime, birthday, address, phone) VALUES (?,?,?, ?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$gmail , $username , $password, $role , $createtime, $birthday, $address, $phone]);
    }


}