<!-- <?php
print_r($_SESSION['cart']);
?> -->
@if(isset($check))
<script>
    alert(<?= $check ?>)
</script>

@endif
@extends('layout.main')
@section('content')
<div class="app__container container__giohang">
    <div class="">
        <div class="container  app__content">

                <div class="d-flex mb-3">
                    <h1 style="font-size: 35px;" class="home-filter__giohang">Giỏ hàng</h1>
                </div>
            <form action="{{route('deleteCart')}}" id="formSelectProduct" method="post">
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
                        <td>
                            @if(isset($_SESSION['cart']))
                            <input type="checkbox" value="{{ $pro->detail_product_id }}" name="selectedProduct[]" class="selectProduct">
                            @else
                            <input type="checkbox" value="<?= $quantity[$keyPro]->id ?>" name="selectedProduct[]" class="selectProduct"  data-productid="{{ $pro->detail_product_id }}">
                            @endif
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
                            <input type="number" class='quantity[]' value="{{ $sessionPro['quantity']}}">
                            @endif
                            @endforeach
                            @endif
                            @if(isset($_SESSION['account']))
                            @php
                            echo "<input type='number' data-id='{$pro->detail_product_id}' class='data-id' value='{$quantity[$keyPro]->count}'>"; 
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
                                <button name="muatatca" onclick="" type="submit" class="btn btn--primary home-card__btn-muangay">Mua Tất Cả</button>
                            </div>
                        </div>
                    </div>
                    <!-- ========================================== -->
                    <div class="" style="background-color: var(--white-color); ">
                        <span class="home-filter__buyall-tongtien-text">Tổng tiền : </span>
                        <input class="home-filter__buyall-tongtien" style="width: 150px;" type="text" name="totalPrice" value="0" readonly id="totalPrice">
                        <button name="muamucdachon" type="submit" class="btn home-filter__btn-buyall btn--primary">Mua Mục Đã Chọn</button>
                    </div>
                </div>
            </form>
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
        //check quantity:    var checkboxes = document.querySelectorAll('.selectProduct');   
    checkboxes.forEach(function(checkbox) {   
        checkbox.addEventListener('change', function() {   
            var productId = this.dataset.productid;   
            var parentElement = this.closest('tr'); // Truy cập đến phần tử cha là tr   
            var dataIdElement = parentElement.querySelector('.data-id'); // Truy cập đến phần tử chứa data-id   
 
            if (dataIdElement) { // Kiểm tra xem phần tử chứa data-id có tồn tại không 
                var dataId = dataIdElement.dataset.id; // Lấy giá trị data-id từ phần tử chứa data-id   
                console.log(dataId); // Hiển thị giá trị data-id trong console   
 
                var quantityInput = parentElement.querySelector('.data-id');   
 
                if (this.checked) {   
                    quantityInput.setAttribute('name', `quantity[]`);   
                } else {   
                    quantityInput.removeAttribute('name');   
                }   
            } else { 
                console.log('Không tìm thấy phần tử chứa data-id'); 
            } 
        });   
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
                    let quantityInput = checkbox.closest('tr').querySelector('.data-id');
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
            const checkboxes = document.querySelectorAll('.selectProduct:checked');
            const selectedProducts = Array.from(checkboxes).map(checkbox => checkbox.value);
            document.getElementById('selectedProducts').value = JSON.stringify(selectedProducts);
            document.getElementById('formSelectProduct').submit();
        }
    }
</script>
@endsection