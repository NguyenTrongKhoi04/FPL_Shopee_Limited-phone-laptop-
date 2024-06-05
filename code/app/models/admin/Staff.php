<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Staff extends BaseModel
{
    public function insertOrder_ByStaff($totalOrder, $id_voucher, $id_account, $id_ship)
    {
        if (!empty($id_voucher)) {
            $sql = "INSERT INTO orders (totalorder, id_voucher, status, time_order, id_user, id_ship) VALUES (?, ?, 1, NOW(), ?, ?)";
            $params = [$totalOrder, $id_voucher, $id_account, $id_ship];
        } else {
            $sql = "INSERT INTO orders (totalorder, status, time_order, id_user, id_ship) VALUES (?, 1, NOW(), ?, ?)";
            $params = [$totalOrder, $id_account, $id_ship];
        }
        $this->setQuery($sql);
        // var_dump($params);

        return $this->loadID($params);
    }

    public function insertOrderDetail_ByStaff($id_order, $id_pro, $count, $comment, $address, $phone)
    {
        $sql = "INSERT INTO orderdetail VALUES (?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(["", $id_order, $id_pro, $count, $comment, $address, $phone]);
    }
}
