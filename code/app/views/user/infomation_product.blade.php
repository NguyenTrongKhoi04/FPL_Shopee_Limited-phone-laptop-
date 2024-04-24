@extends('layout.main')
@section('content')
<div class="app__container ">
    <div class="grid infor-flex" id="inforpd">
        <div class="grid__column-3">
            <div class="infor-product-left">
                <div class="infor-product-left__item">
                    <img src="../assets/img_product/sachhay_camnangtuduyphanbien.jpg" alt="" class="infor-product-left__img">
                </div>
            </div>
        </div>
        <div class="grid__column-9">
            <div class="infor-product-right">
                <form action="" method="POST">

                    <h3 class="infor-product-right__name">
                        Tên sản phẩm
                    </h3>
                    <div class="infor-product__right-price-old">
                        <h4 class="infor-product__right-price-number">
                            Giá cũ
                        </h4>
                    </div>
                    <div class="infor-product__right-price">
                        <h4 class="infor-product__right-price-number">
                            Giá mới
                        </h4>
                    </div>
                    <div class="infor-product__right-quantity">
                        <span class="infor-product__right-quantity-number">Số lượng:</span>
                        <input style="padding-left: 8px;" class="" type="number" name="soluongsanpham" value="1" min="1" max="100">
                        <span class="infor-product__right-sanphamcosan">
                            Số lượng sản phẩm có sẵn
                        </span>
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
    <div class="container__ctsp-title">
        <p class="container__ctsp-title-text">Chi tiết sản phẩm</p>
    </div>
    <ul class="container__ctsp-list">
        <li class="container__ctsp-list-item">
            Danh mục : <span class="container__ctsp-list-item-primary">
                Tên danh mục
            </span>
        </li>
        <li class="container__ctsp-list-item">
            Nhà xuất bản : <span class="container__ctsp-list-item-primary">
                Nhà xuất bản kim đồng
            </span>
        </li>
        <li class="container__ctsp-list-item">
            Số lượng : <span class="container__ctsp-list-item-primary">
                2000
            </span>
        </li>
        <li class="container__ctsp-list-item container__ctsp-list-item-mota">
            Mô tả : <span class="container__ctsp-list-item-primary ">
                Mô tả sản phẩm
            </span>
        </li>
    </ul>
</div>
<div class="grid container__ctsp">
    <div class="container__ctsp-title">
        <p class="container__ctsp-title-text">Bình luận</p>
        <form action="" class="form__comments" method="POST">
            <input class="form__comments-input" name="content" type="text" placeholder="Nhập bình luận" autocomplete="off" name="" id="">
            <a href="home.php?act=login" class="btn form__comments-btn">Gửi bình luận</a>

        </form>
    </div>
    <ul class="container__ctsp-list-comments">
        <li class="container__ctsp-comment">
            <div class="container__ctsp-comment-user">
                <div class="container__ctsp-comment-user-img">
                    <img src="../assets/img_user/anhdep.jpg" alt="" class="container__ctsp-comment-user-image">
                </div>
                <div class="container__ctsp-user-name_time">
                    <p class="container__ctsp-comment-user-name">
                        Tên hiển thị
                    </p>
                    <p class="container__ctsp-comment-time">
                        04/04/2024
                    </p>
                </div>
            </div>
            <p class="container__ctsp-comment-user-content">
                ádsadsadsadsadsaaaaaaaaaaaa
            </p>
        </li>
    </ul>
</div>
<div class="grid container__ctsp">
    <div class="container__ctsp-heading">
        <h3 class="container__ctsp-heading">Sản phẩm cùng loại</h3>
    </div>
    <div class="grid__row">
        <div class=" flex-same_product">
            <div class="grid__column-2-4" style="min-width: 224px;">
                <a href="home.php" class="home-product-item">
                    <div class="home-product-item__img" style="background-image: url(../assets/img_product/sachhay_camnangtuduyphanbien.jpg);">
                    </div>
                    <h4 class="home-product-item__name">
                        Tên sản phẩm
                    </h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old">
                            Giá cũ 200
                        </span>
                        <span class="home-product-item__price-current">
                            Giới mới 100
                        </span>

                    </div>
                    <div class="home-product-item__action">
                        <span class="home-product-item__like home-product-item__liked">
                            <i class="home-product-item__like-icon-isset fa-solid fa-heart"></i>
                            <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                        </span>
                        <!-- <div class="home-product-item__rating">
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class=" fa-solid fa-star"></i>
                            </div> -->

                    </div>
                    <div class="home-product-item__origin">
                        <span class="home-product-item__brand">Số lượng:
                            20
                        </span>
                        <span class="home-product-item__origin-name">
                            dsadas
                        </span>
                    </div>

                    <div class="home-product-item__sale-off">
                        <div class="home-product-item__sale-off-percent">
                            50
                        </div>
                        <span class="home-product-item__sale-off-label">Giảm</span>
                    </div>
                </a>
            </div>
            <div class="grid__column-2-4" style="min-width: 224px;">
                <a href="home.php" class="home-product-item">
                    <div class="home-product-item__img" style="background-image: url(../assets/img_product/sachhay_camnangtuduyphanbien.jpg);">
                    </div>
                    <h4 class="home-product-item__name">
                        Tên sản phẩm
                    </h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old">
                            Giá cũ 200
                        </span>
                        <span class="home-product-item__price-current">
                            Giới mới 100
                        </span>

                    </div>
                    <div class="home-product-item__action">
                        <span class="home-product-item__like home-product-item__liked">
                            <i class="home-product-item__like-icon-isset fa-solid fa-heart"></i>
                            <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                        </span>
                        <!-- <div class="home-product-item__rating">
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class=" fa-solid fa-star"></i>
                            </div> -->

                    </div>
                    <div class="home-product-item__origin">
                        <span class="home-product-item__brand">Số lượng:
                            20
                        </span>
                        <span class="home-product-item__origin-name">
                            dsadas
                        </span>
                    </div>

                    <div class="home-product-item__sale-off">
                        <div class="home-product-item__sale-off-percent">
                            50
                        </div>
                        <span class="home-product-item__sale-off-label">Giảm</span>
                    </div>
                </a>
            </div>
            <div class="grid__column-2-4" style="min-width: 224px;">
                <a href="home.php" class="home-product-item">
                    <div class="home-product-item__img" style="background-image: url(../assets/img_product/sachhay_camnangtuduyphanbien.jpg);">
                    </div>
                    <h4 class="home-product-item__name">
                        Tên sản phẩm
                    </h4>
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old">
                            Giá cũ 200
                        </span>
                        <span class="home-product-item__price-current">
                            Giới mới 100
                        </span>

                    </div>
                    <div class="home-product-item__action">
                        <span class="home-product-item__like home-product-item__liked">
                            <i class="home-product-item__like-icon-isset fa-solid fa-heart"></i>
                            <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                        </span>
                        <!-- <div class="home-product-item__rating">
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class=" fa-solid fa-star"></i>
                            </div> -->

                    </div>
                    <div class="home-product-item__origin">
                        <span class="home-product-item__brand">Số lượng:
                            20
                        </span>
                        <span class="home-product-item__origin-name">
                            dsadas
                        </span>
                    </div>

                    <div class="home-product-item__sale-off">
                        <div class="home-product-item__sale-off-percent">
                            50
                        </div>
                        <span class="home-product-item__sale-off-label">Giảm</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
</div>
@endsection