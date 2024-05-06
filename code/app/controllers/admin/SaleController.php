<?php

namespace App\Controllers\Admin;

use App\Models\Admin\Sale;

class SaleController extends BaseAdminController
{
    private $sale;
    
    public function __construct()
    {
        $this->sale = new Sale();
    }

    public function listSale(){
        $allSale = $this->sale->getSale(' * ');
        $allSalePro = $this->sale->getPro();
        
        return $this->render('sale.ListSale', compact('allSale','allSalePro'));
    }

    public function addSaleUI()
    {
        return $this->render('sale.AddSale');
    }
    
    public function addSale()
    {
        extract($_POST);
            //        echo"<pre>";
            // print_r($_POST);
            // echo"</pre>";die;
        $flagErrors = false;
        $error = [];
        if($namesale ==null){
            $flagErrors = true;
            $error['namesale'] = "nhập tên sale";
        }
        if(time() >= strtotime($datesale)){
            $flagErrors = true;
            $error['datesale'] = "nhập ngày lớn hơn ngày hôm nay";
        }
        if(strtotime($datesale) >= strtotime($timesale)){
            $flagErrors = true;
            $error['timesale'] = "nhập ngày lớn hơn ngày bắt đầu sale";
        }
        if($valuesale > 100 || $valuesale < 0){
            $flagErrors = true;
            $error['valuesale'] = "nhập ngày lớn hơn ngày bắt đầu sale";
        }
        if($flagErrors == false){
            $check = $this->sale->addSale("",$namesale, $datesale, $timesale, $valuesale);
            if ($check) {
                $mes = "Thêm thành công";
                flash('success', $mes, 'addSale');
            }
        }else{
            return $this->render('sale.AddSale',compact("error"));
        }
        return $this->render('sale.AddSale');
    }

    public function deleteSale($id)
    {
        $check = $this->sale->checkSale("Product", $id);
        if($check != null ){
            $mes = "Xóa thành công vì có sản phẩm đang sale";
            flash('success', $mes, 'listSale');
        }
        $this->sale->deleteSale($id);
        flash('success', 'ban da xóa thanh cong', 'listSale');
    }
}