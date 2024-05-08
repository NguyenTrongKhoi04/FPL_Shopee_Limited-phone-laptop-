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
                    <table class="table">
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Hãng</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                        </tr>


                        @foreach($product as $pro)
                        <tr>
                            <td> <img src="{{$pro->image}}" alt="" width="80px">
                            </td>
                            <td>
                                <p>{{$pro->namepro}}</p>
                            </td>
                            <td>
                                <p >{{$pro->name_subcate}}</p>
                            </td>
                            <td>
                                
                            <del>{{$pro->price}}|</del><p style="color: red ;position: relative; top: -15px;left: 40px;">{{ $pro->price - ($pro->price * $pro->valuesale / 100) }}vnđ</p>
                            </td>
                            <td>
                                <?php foreach ($_SESSION['cart'] as $sessionPro) {
                                    // print_r($pro->detail_product_id);
                                    // print_r($sessionPro['id']);

                                    if ($sessionPro['id'] == $pro->detail_product_id) {

                                        echo $sessionPro['quantity'];
                                    }
                                };
                                ?>
                            </td>

                        </tr>
                        @endforeach
                    </table>
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