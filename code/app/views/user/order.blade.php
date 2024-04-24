@extends('layout.main')
@section('content')
<div class="app__container container__giohang ">
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
                            <a href="home.php?act=giohang" class="catogery-item__link">
                                Giỏ hàng
                            </a>
                        </li>
                        <li class="category-item ">
                            <a href="home.php?act=donhang" class="catogery-item__link">
                                Đơn hàng
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="grid__column-10">
                <div class="home-filter">
                    <p class="home-filter__giohang">Đơn hàng</p>
                </div>
                <div class="home-card" style="background-color: var(--white-color);">
                    <div class="home-card-id-order">
                        <p class="home-card-id-order-text">Đơn hàng : <span
                                class="home-card-id-order-text-id">abc</span></p>
                        <p class="home-card-id-order-text">Phí vận chuyển : <span
                                class="home-card-id-order-text-id">10000đ</span></p>
                        <p class="home-card-id-day home-card-address">Địa chỉ giao hàng : <span
                                class="home-card-id-day-a">Nhuận trạch vạn thắng ba vì hà nội</span></p>
                        <p class="home-card-id-day">Ngày tạo đơn : <span class="home-card-id-day-a">28/11/2023</span>
                        </p>
                    </div>
                    <ul class="home-card-list home-card-list-donhang">
                        <li class="home-card-item">
                            <div class="home-card-item-img">
                                <img src="../assets/img_product/sachhay_daubinhthuongbanvanluonlaphienbangioihan.jpg"
                                    alt="" class="home-card-item-image">
                            </div>
                            <div class="home-card-item-name">
                                <p class="home-card-item-name-text">Tên sản phẩm </p>
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
                                <input style="border: none;" readonly class="home-card-item-quantity-input" min="1"
                                    max="10" type="number" value="1">
                            </div>
                            <div class="home-card-item-thanhtien">
                                <p class="home-card-item-thanhtien-text">Thành tiền : <span
                                        class="home-card-item-thanhtien-number">4000đ</span></p>
                            </div>
                        </li>
                        <li class="home-card-item">
                            <div class="home-card-item-img">
                                <img src="../assets/img_product/sachhay_daubinhthuongbanvanluonlaphienbangioihan.jpg"
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
                                <input style="border: none;" readonly class="home-card-item-quantity-input" min="1"
                                    max="10" type="number" value="1">
                            </div>
                            <div class="home-card-item-thanhtien">
                                <p class="home-card-item-thanhtien-text">Thành tiền : <span
                                        class="home-card-item-thanhtien-number">4000đ</span></p>
                            </div>
                        </li>
                    </ul>
                    <div class="home-card-order">
                        <div class="home-card-order-trangthai">
                            <p class="home-card-order-trangthai-text">Trạng thái : <span
                                    class="home-card-order-trangthai-text-a">Đang giao</span></p>
                        </div>
                        <div class="home-card-order-tongtien">
                            <p class="home-card-order-tongtien-text">Tổng tiền : <span
                                    class="home-card-order-tongtien-number">4000</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection