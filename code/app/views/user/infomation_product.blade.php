@extends('layout.main')
@section('content')
<div class="app__container ">
    <div class="grid infor-flex" id="inforpd">
        <div class="grid__column-3">
            <div class="infor-product-left">
                <div class="infor-product-left__item">
                    <img src="{{$products['image']}}" id="product-image" alt="" class="w-100 h-75 object-fit-cover">
                </div>
            </div>
        </div>
        <div class="grid__column-9">
            <div class="infor-product-right">
                <form action="" method="POST">
                    <h3 class="infor-product-right__name">
                        {{$products[0]['namepro']}}
                    </h3>
                    <div class="">
                        <h4 class="infor-product__right-price-number ps-0 ">
                            Giá : <input type="number" disabled value="{{$products[0]->price}}" class="border-0 bg-white text-danger" id="product-price">
                        </h4>
                        <div class="form-control my-2 py-5 bg-dark-subtle ">
                            <h4 class="">
                                {{$products[0]['description']}}
                            </h4>
                        </div>
                    </div>
                    <div class="align-content-center  d-flex  ">
                        <span class="infor-product__right-quantity-number h3">Số lượng:</span>
                        <button type="button" onclick="handleMinus()"><span class="material-symbols-outlined  btn-outline-light  ">
                                remove
                            </span></button>
                        <input type="text" class="mx-1 text-center border-1  " value="1" name="quntity" id="amout">
                        <button type="button" onclick="handlePlus()"><span class="material-symbols-outlined btn-btn-outline-light  ">
                                add
                            </span></button>
                        <span class="mx-3 h4">
                            Số lượng sản phẩm có sẵn : {{$products[0]['quantity']}}
                        </span>
                    </div>
                    <div class="my-3">
                        <span class="my-3 h3">size: </span>
                        <select class=" px-3 py-2 m-3" onchange="changeProduct()" id="product-select" aria-label="Default select example">
                            @foreach($products as $index => $pro)
                            <option class="h3" value="{{$index}}" data-image="{{$pro['image']}}" data-price="{{$pro['price']}}">
                                {{$pro['namesize']}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="infor-product__right-btn">
                        <input type="text" name="giasanpham" hidden value="" id="">
                        <a href="home.php" class="infor-product__right-btn-add" style="text-decoration: none;"><i class="fa-solid fa-cart-plus"></i>
                            <a href="home.php" class="infor-product__right-btn-buy infor-product__right-btn-buy-link">Mua
                                ngay</a>';
                </form>
            </div>
        </div>
    </div>
</div>
<div class="grid container__ctsp">
    <div class="container__ctsp-title ">
        <p class=" h1 align-content-center mx-4">Comment</p>
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
                        {{$comment->username }}
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
                <a href="" class="home-product-item">
                    <div class="home-product-item__img">
                        <img src="{{$relatPro->image}}" class="w-100 h-100" alt="">
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
                        <div class="home-product-item__sale-off-percent">
                            {{$relatPro -> valuesale}}%
                        </div>
                        <span class="home-product-item__sale-off-label">Giảm</span>
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

    function changeProduct() {
        var selectBox = document.getElementById("product-select");
        var selectedIndex = selectBox.selectedIndex;
        var selectedOption = selectBox.options[selectedIndex];
        var imageSrc = selectedOption.getAttribute("data-image");
        var priceValue = selectedOption.getAttribute("data-price");

        // console.log(imageSrc);
        document.getElementById("product-image").src = imageSrc;
        document.getElementById("product-price").value = priceValue;
    }
</script>
@endsection