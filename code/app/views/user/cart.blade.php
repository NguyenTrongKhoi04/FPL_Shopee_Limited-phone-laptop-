<?php
if (isset($_SESSION["cart"]) && is_array($_SESSION["cart"])) {
    echo "<h2>Danh sách sản phẩm trong giỏ hàng:</h2>";
    echo "<ul>";
    foreach ($_SESSION["cart"] as $item) {
        echo "<li>Product ID: " . $item . "</li>";
    }
    echo "</ul>";
} else {
    echo "Không có sản phẩm nào trong giỏ hàng.";
}
?>
@extends('layout.main')
@section('content')
<div class="app__container container__giohang">
    <div class="grid">
        <div class="grid__row app__content">
            @include('layout.category')

            <div class="ms-5 float-end ">
                <div class="home-filter">
                    <p class="home-filter__giohang">Giỏ hàng</p>
                </div>
                <div class="home-card">
                    @foreach($product as $pro)
                    <ul class="home-card-list">
                        <li class="home-card-item">
                            <input type="checkbox" class="home-card-inp-checkbox" name="checkbox">
                            <div class="home-card-item-img">
                                <img src="{{$pro->image}}" alt="" class="home-card-item-image">
                            </div>
                            <div class="home-card-item-name">
                                <p class="home-card-item-name-text">Tên sản phẩm</p>
                            </div>
                            <div class="home-card-item-danhmuc">
                                <p class="home-card-item-danhmuc-text">danh mục</p>
                            </div>
                            <div class="home-card-item-price">
                                <div class="home-card-item-price-old">
                                    <p class="home-card-item-price-old-text">19000đ</p>
                                </div>
                                <div class="home-card-item-price-new">
                                    <p class="home-card-item-price-old-text">18000đ</p>
                                </div>
                            </div>
                            <div class="home-card-item-quantity">
                                <p class="home-card-item-quantity-number">Số lượng:</p>
                                <input class="home-card-item-quantity-input" min="1" max="10" type="number" value="1">
                            </div>
                            <!-- <div class="home-card-item-delete">
                                            <form action="" class="home-card__muangay">
                                                <button type="submit" name="muangay" class="home-card__btn-delete">Xóa</button>
                                            </form>
                                        </div> -->
                        </li>
                    </ul>
                    @endforeach
                </div>
                <div class="home-filter__buyall" style="background-color: var(--white-color);">
                    <div class="home-filter__buyall-control">
                        <div class="home-card-item-delete">
                            <div class="home-card__muangay">
                                <button name="xoamucdachon" type="submit" class="btn home-card__btn-muangay">Xóa
                                    mục đã chọn</button>
                            </div>
                        </div>
                        <div class="home-card-item-delete">
                            <div class="home-card__muangay">
                                <button name="muamucdachon" type="submit" class="btn btn--primary home-card__btn-muangay">Mua mục đã chọn</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form action="" class="home-filter " style="background-color: var(--white-color);">
                        <span class="home-filter__buyall-tongtien-text">Tổng tiền : </span>
                        <!-- <p class="home-filter__buyall-tongtien">123406đ</p> -->
                        <input class="home-filter__buyall-tongtien" type="text" name="" value="1234567" readonly id="">
                        <button type="submit" class="btn home-filter__btn-buyall btn--primary">Mua tất
                            cả</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection