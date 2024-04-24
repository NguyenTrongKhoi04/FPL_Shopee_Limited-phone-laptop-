@extends('layout.main')
@section('content')
<div class="app__container container__giohang">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-2">
                <nav class="category">
                    <h3 class="category__heading">
                        <i class="category__heading-icon fa-solid fa-list"></i>
                        Danh mục
                    </h3>
                    <ul class="category-list">
                        <li class="category-item ">
                            <a href="#" class="catogery-item__link">
                                Truyện cười
                            </a>
                        </li>
                        <li class="category-item category-item--active">
                            <a href="#" class="catogery-item__link">
                                Manga
                            </a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="catogery-item__link">
                                Sách
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="grid__column-10">
                <div class="home-filter">
                    <p class="home-filter__giohang">Giỏ hàng</p>
                </div>
                <div class="home-card">
                    <ul class="home-card-list">
                        <li class="home-card-item">
                            <input type="checkbox" class="home-card-inp-checkbox" name="checkbox">
                            <div class="home-card-item-img">
                                <img src="../../../../public/user/assets/img_product/sachhay_daubinhthuongbanvanluonlaphienbangioihan.jpg"
                                    alt="" class="home-card-item-image">
                            </div>
                            <div class="home-card-item-name">
                                <p class="home-card-item-name-text">Tên sản phẩm áhjgdsjsdgfdk
                                    hgdsfjhgfdsjhgfdsjh dsfvfjdysgds jhfdsbjfdsuhdsfhjgv</p>
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
                                <button name="muamucdachon" type="submit"
                                    class="btn btn--primary home-card__btn-muangay">Mua mục đã chọn</button>
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