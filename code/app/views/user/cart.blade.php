@extends('layout.main')
@section('content')
<div class="app__container container__giohang">
    <div class="grid">
        <div class="grid__row app__content">

            <h1 class="home-filter__giohang">Giỏ hàng</h1>
            <table class="table">
                <tr>
                    <th><input type="checkbox" name="selectAll" id="selectAll">Chọn tất cả</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Hãng</th>
                    <th>Phân loại</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
                @foreach($product as $keyPro =>$pro)
                <tr>
                    <td> <input type="checkbox" value=""  name="selectProduct[]" class="selectProduct"> 
                </td>
                    <td> <img src="{{$pro->image}}" alt="" width="80px"> </td>
                    <td>
                        <p>{{$pro->namepro}}</p>
                    </td>
                    <td>
                        <p>{{$pro->name_subcate}}</p>
                    </td>
                    <td>
                        <p>{{$pro->namesize}}</p>
                    </td>
                    <td>
                        <del>{{$pro->price}}|</del>
                        <p style="color: red; position: relative; top: -15px; left: 40px;">{{ $pro->price - ($pro->price * $pro->valuesale / 100) }}vnđ</p>
                    </td>
                    <td>
                        @if(isset($_SESSION['cart']))
                        @foreach ($_SESSION['cart'] as $sessionPro)
                        @if ($sessionPro['id'] == $pro->detail_product_id)
                        <input type="number" class='quantity' value="{{ $sessionPro['quantity']}}">
                        @endif
                        @endforeach
                        @endif
                        @if(isset($_SESSION['account']))
                        @php
                        echo "<input type='number' class='quantity' value='{$quantity[$keyPro]->count}'>"
                        @endphp
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="home-filter__buyall" id="formmua" style="background-color: var(--white-color);">
                <div class="home-filter__buyall-control">
                    <div class="home-card-item-delete">
                        <div class="home-card__muangay">
                            <button name="xoamucdachon" type="submit" class="btn home-card__btn-muangay">Xóa mục đã chọn</button>
                        </div>
                    </div>
                    <div class="home-card-item-delete">
                        <div class="home-card__muangay">
                            <button name="muamucdachon" onclick="checkAccount()" type="submit" class="btn btn--primary home-card__btn-muangay">Mua mục đã chọn</button>
                        </div>
                    </div>
                </div>
                <form action="" class="" style="background-color: var(--white-color); ">
                    <span class="home-filter__buyall-tongtien-text">Tổng tiền : </span>
                    <input class="home-filter__buyall-tongtien" style="width: 150px;" type="text" name="totalPrice" value="0" readonly id="totalPrice">
                    <button onclick="checkAccount()" type="button" class="btn home-filter__btn-buyall btn--primary">Mua tất cả</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.selectProduct');
        const totalPriceInput = document.getElementById('totalPrice');

        selectAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
            calculateTotalPrice();
        });

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', calculateTotalPrice);
        });

        function calculateTotalPrice() {
            let totalPrice = 0;
            let totalQuantity = 0;
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    let priceCell = checkbox.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;
                    let priceText = priceCell.querySelector('p').innerText;
                    let price = parseFloat(priceText.replace('vnđ', '').replace(/,/g, ''));
                    totalPrice += price;
                    let quantityInput = checkbox.closest('tr').querySelector('.quantity');
                    if (quantityInput) {
                        let quantity = parseFloat(quantityInput.value);
                        totalQuantity += quantity;
                    }
                }
            });
            totalPriceInput.value = formatCurrency(totalPrice * totalQuantity);

            function formatCurrency(value) {
                return value.toLocaleString('vi-VN') + ' vnđ';
            }
            // console.log(document.getElementById('quantity').value);

        }



    });


    var accountExists = <?= isset($_SESSION['account']) ? 'true' : 'false' ?>;

    function checkAccount() {
        if (!accountExists) {
            window.location.href = "login";
        } else {
            window.location.href = "addCart";
        }
    }
</script>
@endsection