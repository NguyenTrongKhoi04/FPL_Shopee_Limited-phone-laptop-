<?php

namespace App\Controllers\Admin;

use App\Models\Admin\StoreProduct;

class SubCategoryController extends BaseAdminController
{
    public $product;
    public $account;
    public function __construct()
    {
        $this->product = new StoreProduct();
    }
    
    public function addSubCategory()
    {
        if (isset($_POST['btn-submitadd'])) {
            $this->product->addSubCate($_POST['name_subcate'], $_POST['id_category']);
            $check = 'thêm thành công';
            $products = $this->product->listStorepro();
            $subcategory = $this->product->getSubAllCategory();
            $storedetaiproduct = $this->product->getStoreDetailProduct();
            $size = $this->product->getSize();
            $cate = $this->product->getCategory();
            $countpro = $this->product->getCountStoreDetailProduct();
            $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
        }
    }
    
    public function deleteSubcate($id)
    {
        $this->product->deleteSubcate($id);
        $check = 'xóa thành công dannh mục';
        $products = $this->product->listStorepro();
        $subcategory = $this->product->getSubAllCategory();
        $storedetaiproduct = $this->product->getStoreDetailProduct();
        $size = $this->product->getSize();
        $cate = $this->product->getCategory();
        $countpro = $this->product->getCountStoreDetailProduct();
        $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
    }

    public function detailSubcate($id)
    {
        $subcategory = $this->product->getSubAllCategory();
        $cate = $this->product->getCategory();
        $oneSub = $this->product->get1Subcategory($id);
        $this->render('Products.detailSubcate', compact('oneSub', 'subcategory', 'cate'));
    }

    public function updateSubcate($id)
    {
        if (isset($_POST['btn-submit'])) {
            $this->product->updateSubcate($id, $_POST['name_subcate'], $_POST['id_category']);
            $check = 'sửa thành công';
            $products = $this->product->listStorepro();
            $subcategory = $this->product->getSubAllCategory();
            $storedetaiproduct = $this->product->getStoreDetailProduct();
            $size = $this->product->getSize();
            $cate = $this->product->getCategory();
            $countpro = $this->product->getCountStoreDetailProduct();
            $this->render('Products.listStorepro', compact('check', 'products', 'subcategory', 'storedetaiproduct', 'size', 'countpro', 'cate'));
        }
    }
}