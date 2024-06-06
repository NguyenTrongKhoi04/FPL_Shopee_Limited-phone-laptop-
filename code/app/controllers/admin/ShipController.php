<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Ship;

class ShipController extends BaseAdminController
{
    private $ship;
    
    public function __construct()
    {
        $this->ship = new Ship();
    }

    public function listShip(){
        $allShip = $this->ship->getShip(' * ');
        
        return $this->render('ship.ListShip', compact("allShip"));
    }

    public function addShipUI()
    {
        return $this->render('ship.AddShip');
    }
    
    public function addShip()
    {
        extract($_POST);
            //        echo"<pre>";
            // print_r($_POST);
            // echo"</pre>";die;
        $flagErrors = false;
        $error = [];
        if($nameship == null){
            $flagErrors = true;
            $error['nameship'] = "nhập tên ship";
        }

        if(!empty($this->ship->checkShipName(" * ",$nameship))){
            $flagErrors = true;
            $error['nameship'] = "tên ship đã tồn tại";
        }

        if($timeship == null || $timeship <= 15){
            $flagErrors = true;
            $error['timeship'] = "nhập thời gian ship lớn hơn 15 phút";
        }
        if($priceship <= 0){
            $flagErrors = true;
            $error['priceship'] = "Nhập giá lớn hơn 0";
        }

        if($flagErrors == false){
        
            $check = $this->ship->addShip("",$nameship, $timeship, $priceship);
            if ($check) {
                $mes = "Thêm thành công";
                flash('success', $mes, 'addShip');
            }
        }
            return $this->render('ship.AddShip',compact("error"));
        }

    public function stopShip($id)
    {
        $this->ship->stopShip($id);
        flash('success', 'ban da dừng ship thanh cong', 'listShip');
    }
    
    public function continueShip($id)
    {
        $this->ship->continueShip($id);
        flash('success', 'ban da dừng ship thanh cong', 'listShip');
    }
}