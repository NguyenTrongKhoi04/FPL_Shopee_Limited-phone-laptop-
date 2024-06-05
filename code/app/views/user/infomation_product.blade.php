@extends('layout.main')
        @section('content')



<div class="container-nav">
    <a href="{{route('product')}}">Trang Chủ</a>/ <a class="disabled " disabled="disabled" href="">Chi tiết sản phẩm</a>
</div>
<div class="app__container ">
    <div class="grid infor-flex" id="inforpd">
        <div class="grid__column-3">
            <form action="{{route('insertSession')}}" method="POST" class="rounded p-5 pt-0 start-0 me-5 mt-xxl-5 ">

                <div class="infor-product-left">
                    <div class="infor-product-left__item">
                        <img src="{{$products['image']}}" id="product-image" alt="" class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
        </div>
        <div class="grid__column-9 mt-xxl-5 ">
            <div class="infor-product-right">
            <h3 style="color: red;" id="salevalue">-{{$products[0]['valuesale']}}%<i class="h1 bi bi-fire"></i></h3>

                <h1 class="infor-product-right__name">{{$products[0]['namepro']}}</h1>
                <div class="priceandsold">
                    <h4 class="infor-product__right-price-number ps-0 ">
                        <b id="giatien">
                           <del style=""> <p style="font-size: 13px;" id="product-price"></p></del> <p id="product-price-sc" style="font-size: 25px; color: red;"> </p>
                        </b>
                        <!-- Giá : <input type="number" disabled value="{{$products[0]->price}}" class="border-0 bg-white text-danger" id="product-price"> -->
                    </h4>
                    <div class="infor-product__right-price-number mb-5">
                        {{$products[0]['quantity']}} Sold 
                    </div>
                </div>
                <div class="infor-product__right-des rounded p-3 mb-5">
                    {{$products[0]['description']}}
                </div>

            <div class="right">
                <div class="mb-3">
                    <label for="">Size: </label>
                    <select name="option" class="form-control w-25  px-3 py-2 m-3" onchange="changeProduct()" id="product-select" aria-label="Default select example">
                        @foreach($products as $index => $pro)
                        <option class="h3" value="{{$pro['detail_product_id']}}" data-image="{{$pro['image']}}" data-sale="{{$pro['valuesale']}}" data-price="{{$pro['price']}}" data-id="{{$pro['detail_product_id']}}">
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
                        <input type="text" name="giasanpham" hidden value="" ><span class="rounded  infor-product__right-btn-add" style="text-decoration: none;"><button style="border: none; background-color: white; " type="submit" class="submitcart" name="submit">Cart</button></span>
                        <a href="home.php" class="infor-product__right-btn-buy infor-product__right-btn-buy-link">Mua
                            ngay</a>';
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<br> <br> <br> <br> <br> <br> <br>
<div class="grid container__ctsp">
    <div class="container__ctsp-heading">
        <h3 class="container__ctsp-heading">Sản phẩm cùng loại</h3>
    </div>
    <div class="divsplienquan" id="scroll" style="display: flex;overflow-x:scroll;">
    @foreach($relatedProduct as $pro)    
    <a href="{{route('info-pro/'.$pro->id_pro)}}" class="" id="spcungloai">
    <div class="m-5 rounded ">
        <img src="{{$pro->image}}" alt="" width="250px" height="300px">
        <h3>{{$pro->namepro}}</h3>
        <h6>Sold: {{$pro->quantity}}</h6>
    </div>
</a>
    @endforeach
    </div>
</div>
<style>
    #scroll::-webkit-scrollbar { 
  width: 0 !important;
  display: none; 
}
</style>
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
        var sale = selectedOption.getAttribute("data-sale");
        window.idValue = idValue;
        // console.log(imageSrc);
        document.getElementById("product-image").src = imageSrc;
        document.getElementById("product-price").innerHTML = priceValue+"|";
        document.getElementById("product-price-sc").innerHTML =priceValue - (priceValue * (sale/100))+"Vnđ";
    }

</script>
@endsection