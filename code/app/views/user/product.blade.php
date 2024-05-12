<?php
if(isset($_SESSION['cart']) && isset($_SESSION['account'])){
    header("Location: addCart");
    exit;
}

?>
@extends('layout.main')
@section('content')
@if(isset($check))
    <script>
        alert("{{ $check }}");
    </script>
@endif
<div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            @include('layout.category')
            <div class="grid__column-10">
                <div class="home-filter">
                    <span class="home-filter__label">Sắp xếp theo</span>
                    <a href="home.php?act=phobien" class="btn btn-light text-center align-content-center  ">Phổ biến</a>
                    <a href="home.php" class="btn btn-light mx-5  align-content-center ">Mới nhất</a>
                    <!-- <button class="home-filter__btn btn">Bán chạy</button> -->
                    <div class="form-control w-25  select-input">
                        <i class="select-input__icon fas fa-angle-down"></i>
                        <ul class="select-input__list">
                            <li class="select-input__item">
                                <a href="home.php?" class="select-input__link">Giá thấp đến cao</a>
                            </li>
                            <li class="select-input__item">
                                <a href="home.php?" class="select-input__link">Giá cao đến thấp</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="home-product">
                    <div class="grid__row justify-content-center mt-xxl-5">
                        <!-- product column 2-4 phần sản phẩm copy cả grid__column-2-4 -->
                        @foreach($products as $pr)
                        <div class="grid__column-2-4 ms-5">
                            <a href="{{route('info-pro/'.$pr->id_pro)}}" class="home-product-item">
                                <div style="width: 190px; height: 60%;" class="home-product-item_img mb-5">
                                    <img style="object-fit: cover; width: 200px; height: 250px;" src="{{$pr->image}}" class="w-100 " alt="">
                                </div>
                                <h4 class="home-product-item__name h3 my-1 align-content-center  mx-3">
                                    {{$pr->namepro}}
                                </h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-current h4 text-danger">
                                        Size: {{$pr->size}}
                                    </span>
                                </div>
                                <div class="home-product-item__origin">
                                    <span class="home-product-item__brand h5">Số Lượng:
                                        {{$pr->quantity}}
                                    </span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <div class="home-product-item__sale-off-percent">
                                        {{$pr->valuesale}}%
                                    </div>
                                    <span class="home-product-item__sale-off-label">Giảm</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <ul class="pagination home-product__pagination">
                    <li class="pagination-item">
                        <a href="home.php" class="pagination-item__link">
                            <i class="pagination-item__icon fas fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="home.php" class="pagination-item__link ">
                            5
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="home.php" class="pagination-item__link">
                            <i class="pagination-item__icon fas fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection