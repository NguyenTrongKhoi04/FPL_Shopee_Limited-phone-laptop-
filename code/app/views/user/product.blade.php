@extends('layout.main')
@section('content')
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
                    <div class="select-input">
                        <span class="select-input__label">Giá</span>
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
                    <div class="grid__row">
                        <!-- product column 2-4 phần sản phẩm copy cả grid__column-2-4 -->
                        @foreach($products as $pr)
                        <div class="grid__column-2-4">
                            <a href="{{route('info-pro/'.$pr->id)}}" class="home-product-item">
                                <div class="home-product-item__img">
                                    <img src="https://toigingiuvedep.vn/wp-content/uploads/2020/12/anh-phong-canh-thien-nhien-tuyet-dep.jpg" style=" width: 100%;" alt="">
                                </div>
                                <h4 class="home-product-item__name">
                                    {{$pr->namepro}}
                                </h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-current">
                                        Size: {{$pr -> size}}
                                    </span>
                                </div>
                                <div class="home-product-item__action">
                                    <span class="home-product-item__like home-product-item__liked">
                                        <i class="home-product-item__like-icon-isset fa-solid fa-heart"></i>
                                        <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                    </span>
                                </div>
                                <div class="home-product-item__origin">
                                    <span class="home-product-item__brand">Số Lượng:
                                        {{$pr -> quantity}}
                                    </span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <div class="home-product-item__sale-off-percent">
                                        {{$pr -> sale}}%
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