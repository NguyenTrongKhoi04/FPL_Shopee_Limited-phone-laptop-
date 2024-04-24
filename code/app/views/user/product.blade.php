@extends('layout.main')
@section('content')
<div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-2">
                <nav class="category">
                    <h3 class="category__heading">
                        <i class="category__heading-icon fa-solid fa-list"></i>
                        Danh mục
                    </h3>
                    <ul class="category-list">
                        <li class="category-item">
                            <a href="home.php" class="catogery-item__link">
                                Danh mục 1
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="home.php" class="catogery-item__link">
                                Danh mục 2
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="home.php" class="catogery-item__link">
                                Danh mục 3
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="home.php" class="catogery-item__link">
                                Danh mục 4
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="grid__column-10">
                <div class="home-filter">
                    <span class="home-filter__label">Sắp xếp theo</span>
                    <a href="home.php?act=phobien" class="home-filter__btn btn ">Phổ biến</a>
                    <a href="home.php" class="home-filter__btn btn">Mới nhất</a>
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
                        <div class="grid__column-2-4">
                            <a href="home.php" class="home-product-item">
                                <div class="home-product-item__img">
                                    <img src="../assets/img/laptop tuf.jpg" style="width: 100%;" alt="">
                                </div>
                                <h4 class="home-product-item__name">
                                    Tên sản phẩm
                                </h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-old">
                                        Giá cũ
                                    </span>
                                    <span class="home-product-item__price-current">
                                        Giá mới
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
                                        4
                                    </span>
                                    <span class="home-product-item__origin-name">
                                        2
                                    </span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <div class="home-product-item__sale-off-percent">
                                        50%
                                    </div>
                                    <span class="home-product-item__sale-off-label">Giảm</span>
                                </div>
                            </a>
                        </div>
                        <div class="grid__column-2-4">
                            <a href="home.php" class="home-product-item">
                                <div class="home-product-item__img">
                                    <img src="../assets/img/laptop tuf.jpg" style="width: 100%;" alt="">
                                </div>
                                <h4 class="home-product-item__name">
                                    Tên sản phẩm
                                </h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-old">
                                        Giá cũ
                                    </span>
                                    <span class="home-product-item__price-current">
                                        Giá mới
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
                                        4
                                    </span>
                                    <span class="home-product-item__origin-name">
                                        2
                                    </span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <div class="home-product-item__sale-off-percent">
                                        50%
                                    </div>
                                    <span class="home-product-item__sale-off-label">Giảm</span>
                                </div>
                            </a>
                        </div>
                        <div class="grid__column-2-4">
                            <a href="home.php" class="home-product-item">
                                <div class="home-product-item__img">
                                    <img src="../assets/img/laptop tuf.jpg" style="width: 100%;" alt="">
                                </div>
                                <h4 class="home-product-item__name">
                                    Tên sản phẩm
                                </h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-old">
                                        Giá cũ
                                    </span>
                                    <span class="home-product-item__price-current">
                                        Giá mới
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
                                        4
                                    </span>
                                    <span class="home-product-item__origin-name">
                                        2
                                    </span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <div class="home-product-item__sale-off-percent">
                                        50%
                                    </div>
                                    <span class="home-product-item__sale-off-label">Giảm</span>
                                </div>
                            </a>
                        </div>
                        <div class="grid__column-2-4">
                            <a href="home.php" class="home-product-item">
                                <div class="home-product-item__img">
                                    <img src="../assets/img/laptop tuf.jpg" style="width: 100%;" alt="">
                                </div>
                                <h4 class="home-product-item__name">
                                    Tên sản phẩm
                                </h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-old">
                                        Giá cũ
                                    </span>
                                    <span class="home-product-item__price-current">
                                        Giá mới
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
                                        4
                                    </span>
                                    <span class="home-product-item__origin-name">
                                        2
                                    </span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <div class="home-product-item__sale-off-percent">
                                        50%
                                    </div>
                                    <span class="home-product-item__sale-off-label">Giảm</span>
                                </div>
                            </a>
                        </div>
                        <div class="grid__column-2-4">
                            <a href="home.php" class="home-product-item">
                                <div class="home-product-item__img">
                                    <img src="https://tse1.mm.bing.net/th?id=OIP.QWL6JYZRIVRDB5vFcarrugHaEo&pid=Api&P=0&h=220"
                                        style="width: 100%;" alt="">
                                </div>
                                <h4 class="home-product-item__name">
                                    Tên sản phẩm
                                </h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-old">
                                        Giá cũ
                                    </span>
                                    <span class="home-product-item__price-current">
                                        Giá mới
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
                                        4
                                    </span>
                                    <span class="home-product-item__origin-name">
                                        2
                                    </span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <div class="home-product-item__sale-off-percent">
                                        50%
                                    </div>
                                    <span class="home-product-item__sale-off-label">Giảm</span>
                                </div>
                            </a>
                        </div>
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