<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Order extends BaseModel
{
    public function  listBill($id)
    {
        $sql = "SELECT orders.*, ship.timeship FROM 
        orders 
        INNER JOIN orderdetail ON orders.id = orderdetail.id_order
        INNER JOIN ship ON ship.id = orders.id_ship
        INNER JOIN detailproduct ON detailproduct.id = orderdetail.id_pro
        INNER JOIN product ON product.id = detailproduct.id_pro
        WHERE orders.id_user = ?
        GROUP BY orders.id
        ORDER BY orders.time_order
        ";

        // class - text - route
        $arrDetailView = [
            ['warning', 'Hủy', 'user_reject'],
            ['danger', 'Hoàn trả', 'user_return']
        ];

        foreach ($arrDetailView as &$item) {
            $item = [
                'class' => $item[0],
                'text' => $item[1],
                'router' => $item[2]
            ];
        }

        $this->setQuery($sql);
        $listBill = $this->loadAllRowsArray([$id]);
        $newItem = $this->getProduct_Orderdetail_Detailproduct(13);

        foreach ($listBill as $key => $bill) {
            $newItem = $this->getProduct_Orderdetail_Detailproduct($bill['id']);
            foreach ($newItem as $i) {
                $listBill[$key]['arr_name_pro'][] = $i['namepro'];
            }

            if (in_array($bill["status"], [1, 2, 3, 5])) {
                $listBill[$key]['detail_view'] = $arrDetailView[0];
            }

            if (in_array($bill["status"], [4])) {
                $listBill[$key]['detail_view'] = $arrDetailView[1];
            }

            // if (in_array($bill->status, [6,7,8,9])) {
            //     $listBill[$key]['detail_view'][] = $arrDetailView;
            // }
        }

        return $listBill;
    }

    public function updateStatusOrder($id, $status, $reasonReject, $reasonReturn = null)
    {
        $sql_ReasonReturn =  (!empty($reasonReturn)) ? " , reason_return = ? " : null;

        $sql = "update orders set status = ?, reason_reject = ? $sql_ReasonReturn where id = ?";

        $this->setQuery($sql);
        $params = [$status, $reasonReject];
        if (!empty($reasonReturn)) {
            $params[] = $reasonReturn;
        }
        $params[] = $id;
        return $this->execute($params);
    }

    public function getProduct_Orderdetail_Detailproduct($id)
    {
        $sql = "SELECT product.namepro FROM 
        product 
        INNER JOIN detailproduct ON detailproduct.id_pro = product.id
        INNER JOIN orderdetail ON orderdetail.id_pro = detailproduct.id_pro
        where orderdetail.id_order = ? 
        GROUP BY orderdetail.id_pro";

        $this->setQuery($sql);
        return $this->loadAllRowsArray([$id]);
    }

    public function listShip()
    {
        $sql = "select * from ship";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function listVoucher()
    {
        $sql = "select * from voucher";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function listStatusOrder()
    {
        $sql = "select * from statusorder";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function listReasonReject()
    {
        $sql = "select * from ReasonReject";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }


    /**
     * =============================================================================
     *                                         Detal Order
     * =============================================================================
     */

    public function getListDetail($id)
    {
        $sql = "SELECT orderdetail.*, detailproduct.image, detailproduct.price, detailproduct.size, product.namepro FROM 
        orderdetail
        INNER JOIN detailproduct ON detailproduct.id = orderdetail.id_pro
        INNER JOIN product ON product.id = detailproduct.id_pro
        WHERE orderdetail.id_order = ?
        ";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function addCart($id_acc, $id_pro, $count)
    {
        $sql = "INSERT INTO `cart`(id_acc, id_pro, count) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_acc, $id_pro, $count]);
    }

    public function cartInLogin($id_acc)
    {
        $sql = "select * from `cart` where id_acc = $id_acc";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getProductCart($id_pro)
    {
        $sql = "SELECT detailproduct.id AS detail_product_id,
            detailproduct.*,subcategory.*, product.*,sale.*, size.* FROM detailproduct inner join product on (detailproduct.id_pro=product.id) inner join subcategory  on(product.id_subcategory=subcategory.id) inner join sale on(product.sale=sale.id) inner join size on(detailproduct.size=size.id) WHERE detailproduct.id IN ($id_pro)";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }


    public function countCart($id_acc)
    {
        $sql = "select * from cart where id_acc = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id_acc]);
    }
}