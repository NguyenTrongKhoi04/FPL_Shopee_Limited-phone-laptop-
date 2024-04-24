@extends('layout.main')
@section('content')
<div class="app__container container__giohang ">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-2">
                <nav class="category">
                    <h3 class="category__heading">
                        <i class="category__heading-icon fa-solid fa-credit-card"></i>
                        Phương thức thanh toán
                    </h3>
                    <select name="" id="" class="form-select ">
                        <option value="1">Thanh toán khi nhận hàng</option>
                        <option value="2">Thanh toán online</option>
                    </select>
                </nav>
            </div>
            <div class="grid__column-10">
                <div class=" home-filter-information-receive">
                    <div class="home-filter-information-receive-header">
                        <i class="information-receive-header-icon fa-solid fa-location-dot"></i>
                        <p class="information-receive-header-text">Địa chỉ nhận hàng</p>
                    </div>
                    <form action="" method="POST">
                        <div class="home-filter-information-receive-content">
                            <div class="home-filter-information-receive-content-name-phone">
                                <p class="home-filter-information-receive-content-name">
                                    Nguyễn Văn A
                                </p>
                                <input type="text" readonly value="09321321" class="home-filter-information-receive-content-phone">
                            </div>
                            <input type="text" value="Hà nội" placeholder="Địa
                                    chỉ" name="address" class="home-filter-information-receive-content-address">
                            <input type="text" value="voucher" placeholder="voucher" name="" class="home-filter-information-receive-content-address">
                        </div>
                </div>
                <div class="home-filter">
                    <p class="home-filter__giohang">Sản phẩm</p>
                </div>
                <div class="home-card" style="background-color: var(--white-color);">

                    <ul class="home-card-list home-card-list-donhang">
                        <div>
                            <li class="home-card-item">
                                <div class="home-card-item-img">
                                    <img src="../assets/img_product/sachhay_bachkhoathuvekhoahoc.jpg" alt="" class="home-card-item-image">
                                </div>
                                <div class="home-card-item-name">
                                    <p class="home-card-item-name-text">
                                        Sách 1
                                    </p>
                                </div>
                                <div class="home-card-item-danhmuc">
                                    <p class="home-card-item-danhmuc-text">
                                        Sách cổ tích
                                    </p>
                                </div>
                                <div class="home-card-item-price">
                                    <div class="home-card-item-price-old">
                                        <p class="home-card-item-price-old-text">
                                            200đ
                                        </p>
                                    </div>
                                    <div class="home-card-item-price-new">
                                        <p class="home-card-item-price-old-text">
                                            100đ
                                        </p>
                                    </div>
                                </div>
                                <div class="home-card-item-quantity">
                                    <p class="home-card-item-quantity-number">Số lượng:</p>
                                    <input style="border: none;" readonly class="home-card-item-quantity-input" min="1" max="10" type="number" value="4">
                                </div>
                                <div class="home-card-item-thanhtien">
                                    <p class="home-card-item-thanhtien-text">Thành tiền : <span class="home-card-item-thanhtien-number">
                                            2321321
                                        </span></p>
                                </div>
                            </li>
                            <div>
                                <p class=" home-card-item-thanhtien-text">Ghi chú : <span class="home-card-item-thanhtien-number">
                                        <input class="form-control pb-5" type="text">
                            </div>
                        </div>
                    </ul>
                    <div class="home-card-order">
                        <div class="home-card-order-tongtien">
                            <p class="home-card-order-tongtien-text">Tổng tiền : <span class="home-card-order-tongtien-number">
                                    2321321đ
                                </span></p>
                        </div>
                        <button type="submit" onclick="return confirm(`Bạn có chắc muốn mua những món đồ này không?Thông tin giao hàng sẽ được dựa trên thông tin bạn cung cấp`)" name="muangay" class="btn btn--primary home-card-order-btn-mua">Mua ngay</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection