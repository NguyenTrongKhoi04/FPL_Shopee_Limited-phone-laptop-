<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idValue"])) {
    // Kiểm tra xem mảng session đã tồn tại chưa
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    
    // Thêm giá trị mới vào mảng session
    $_SESSION["cart"][] = $_POST["idValue"];
    
    // Hiển thị thông báo "Thêm vào giỏ hàng thành công"
    echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';
}
// if (isset($_SESSION["cart"]) && is_array($_SESSION["cart"])) {
//     echo "<h2>Danh sách sản phẩm trong giỏ hàng:</h2>";
//     echo "<ul>";
//     foreach ($_SESSION["cart"] as $item) {
//         echo "<li>Product ID: " . $item . "</li>";
//     }
//     echo "</ul>";
// } else {
//     echo "Không có sản phẩm nào trong giỏ hàng.";
// }
?>
@extends('layout.main')
@section('content')
<div class="container-nav">
    <a href="{{route('product')}}">Trang Chủ</a>/ <a class="disabled " disabled="disabled" href="">Chi tiết sản phẩm</a>
</div>
<div class="app__container ">
    <div class="grid infor-flex" id="inforpd">
        <div class="grid__column-3">
            <form action="" method="POST" class="rounded p-5 pt-0 start-0 me-5 mt-xxl-5 ">

                <div class="infor-product-left">
                    <div class="infor-product-left__item">
                        <img src="{{$products['image']}}" id="product-image" alt="" class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
        </div>
        <div class="grid__column-9 mt-xxl-5 ">
            <div class="infor-product-right">

                <h1 class="infor-product-right__name">{{$products[0]['namepro']}}</h1>
                <div class="">
                    <h4 class="infor-product__right-price-number ps-0 ">
                        Giá : <p id="product-price"></p>
                        <!-- Giá : <input type="number" disabled value="{{$products[0]->price}}" class="border-0 bg-white text-danger" id="product-price"> -->
                    </h4>
                    <div class="infor-product__right-des rounded p-3 mb-5">
                        <h4 class="">
                            {{$products[0]['description']}}
                        </h4>
                    </div>
                </div>

                <div class="infor-product__right-price-number mb-5">
                    Số lượng có sẵn : {{$products[0]['quantity']}}
                </div>
                <div class="mb-3">
                    <label for="">Size: </label>
                    <select class="form-control w-25  px-3 py-2 m-3" onchange="changeProduct()" id="product-select" aria-label="Default select example">
                        @foreach($products as $index => $pro)
                        <option class="h3" value="{{$index}}" data-image="{{$pro['image']}}" data-price="{{$pro['price']}}" data-id="{{$pro['detail_product_id']}}">
                            {{$pro['namesize']}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="float-stat rounded ">

                    <div class="align-content-center  d-flex  ">
                        <button type="button" class="material-symbols-outlinedbtn" onclick="handleMinus()"><span class="material-symbols-outlined">
                                remove
                            </span></button>
                        <input type="text" class="form-control w-25   mx-1 text-center border-1  " value="1" name="quantity" id="amout">
                        <button type="button" class="material-symbols-outlinedbtn" onclick="handlePlus()"><span class="material-symbols-outlined">
                                add
                            </span></button>

                    </div>

                    <div class="d-flex mt-3">
                        <input type="text" name="giasanpham" hidden value="" id=""><span onclick="AddToCart()" class="rounded  infor-product__right-btn-add" style="text-decoration: none;"><i class="fa-solid fa-cart-plus"></i></span>
                        <a href="home.php" class="infor-product__right-btn-buy infor-product__right-btn-buy-link">Mua
                            ngay</a>';
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="grid container__ctsp">
    <div class="container__ctsp-heading">
        <h3 class="container__ctsp-heading">Comment</h3>
    </div>
    <ul class="container__ctsp-list-comments">
        @foreach($comments as $comment)
        <li class="container__ctsp-comment">
            <div class="container__ctsp-comment-user">
                <div class="container__ctsp-comment-user-img">
                    <img src="{{BASE_URL.'public/user/assets/img_user/avtgithub.png'}}" alt="" class="container__ctsp-comment-user-image">
                </div>
                <div class="container__ctsp-user-name_time">
                    <p class="container__ctsp-comment-user-name">
                        {{$comment->username }}:
                    </p>
                </div>
            </div>
            <p class="container__ctsp-comment-user-content">
                {{$comment->comment}}
            </p>
        </li>
        @endforeach
    </ul>
</div>
<div class="grid container__ctsp">
    <div class="container__ctsp-heading">
        <h3 class="container__ctsp-heading">Sản phẩm cùng loại</h3>
    </div>
    <div class="home-product">
        <div class="grid__row">
            <!-- product column 2-4 phần sản phẩm copy cả grid__column-2-4 -->
            @foreach($relatedProduct as $relatPro)
            <div class="grid__column-2-4">
                <a href="{{route('info-pro/'.$relatPro->id_pro)}}" class="home-product-item">
                    <div class="info-product-item__img">
                        <img src="{{$relatPro->image}}" width="200px" alt="">
                    </div>
                    <h4 class="home-product-item__name h3 my-1 align-content-center  mx-3">
                        {{$relatPro->namepro}}
                    </h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-current h4 text-danger">
                            Size: {{$relatPro -> size}}
                        </span>
                    </div>
                    <div class="home-product-item__origin">
                        <span class="home-product-item__brand h5">Số Lượng:
                            {{$relatPro -> quantity}}
                        </span>
                    </div>
                    <div class="home-product-item__sale-off">
                        <div class=" home-product-item__sale-off-percent">
                            {{$relatPro -> valuesale}}%
                        </div><span class="home-product-item__sale-off-label">Giảm</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    let amoutElement = document.getElementById('amout')
    var amount = amoutElement.value
    let render = (amount) => {
        amoutElement.value = amount
    }
    let handlePlus = () => {
        amount++;
        render(amount)
    }
    let handleMinus = () => {
        if (amount > 1) {
            amount--;
        }
        // console.log(amount);
        render(amount)
    }
    amoutElement.addEventListener('input', () => {
        amount = amoutElement.value
        amount = parseInt(amount);
        amount = (isNaN(amount) || amount == 1) ? 1 : amount;
        render(amount);
        // console.log(amount);
    })
    window.onload = function() {
        // Trigger change event to update image and price based on default selection
        changeProduct();
    };
    window.idValue;
    function changeProduct() {
        var selectBox = document.getElementById("product-select");
        var selectedIndex = selectBox.selectedIndex;
        var selectedOption = selectBox.options[selectedIndex];
        var imageSrc = selectedOption.getAttribute("data-image");
        var priceValue = selectedOption.getAttribute("data-price");
        var idValue = selectedOption.getAttribute("data-id");
        window.idValue = idValue;
        // console.log(imageSrc);
        document.getElementById("product-image").src = imageSrc;
        document.getElementById("product-price").innerHTML = priceValue + " Vnđ";
    }

    function AddToCart() {
        console.log(window.idValue);
        var idValue = window.idValue;
        var form = document.createElement("form");
            form.method = "post";
            form.style.display = "none";
            document.body.appendChild(form);

            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "idValue";
            input.value = idValue;
            form.appendChild(input);

            form.submit();
    }
</script>
@endsection