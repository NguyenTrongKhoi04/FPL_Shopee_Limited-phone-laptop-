<?php

namespace App\Controllers\User;

use App\Controllers\User\BaseController;
use App\Models\User\Product;
use App\Models\User\Category;
use App\Models\User\SubCategory;
use App\Models\User\Account;
use App\Models\User\Cart;
use App\Models\User\Size;
use App\Models\User\Comment;
class ProductController extends BaseController
{
    public $product;
    public $category;
    public $subCategory;
    public $account;
    public $size;
    public $comment;
    public $cart;

    // Tạo magic funcion
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->subCategory = new SubCategory();
        $this->account = new Account();
        $this->size = new Size();
        $this->comment = new Comment();
        $this->cart = new Cart();
    }

    // chuyển trang giỏ hàng
    public function product()
    {
        $products = $this->product->getProduct(10);
        $categorys = $this->category->getCategory();
        $subCategorys = $this->subCategory->getSubCategory();
        $pagination = $this->product->pagination();
        $totalPage = ceil(($pagination->total)/10);
        if(isset($_GET['page'])){
            $products = $this->product->productPagination($_GET['page']);
            $categorys = $this->category->getCategory();
            $subCategorys = $this->subCategory->getSubCategory();
            $pagination = $this->product->pagination();
            $totalPage = ceil(($pagination->total)/10); 
            return $this->render('product', compact('products', 'categorys', 'subCategorys', 'totalPage'));
        }
        return $this->render('product', compact('products', 'categorys', 'subCategorys', 'totalPage'));
    }

    public function infoPro($id)
    {
        $products = $this->product->getOneProduct($id);
        $comments = $this->comment->getComment($id);
        $id_category = $products[0]['id_subcategory'];
        $relatedProduct = $this->product->getRelatedProduct($id, $id_category, 5);
        // echo "<pre>";
        // var_dump($relatedProduct);
        // echo "</pre>";
        // die;
        return $this->render('infomation_product', compact('products', 'comments', 'relatedProduct'));
    }

}