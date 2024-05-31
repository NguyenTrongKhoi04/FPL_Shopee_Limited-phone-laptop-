@extends('layout.main')
@section('content')
<!-- Begin Page Content -->

<form action="{{route('staffOrder')}}" method="POST">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 ">Đặt hàng tại quán</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class=" card-body">
                <div class="table-responsive">
                    <h4>Chọn Loại Sản phẩm</h4>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex">
                            <input type="hidden" name="id_product" value="<?= $post['id_product'] ?>">
                            <div class="me-2">Size (GB)</div>
                            <select name="id_size" id="id_size">
                                <?php foreach ($detailProduct as $i) { ?>
                                    <option value="{{$i->id}}">{{$i->size}}</option>
                                <?php } ?>
                            </select>
                            <div>
                                <input type="number" class="ms-3" name="count" id="count-input" placeholder="Nhập số lượng mua">
                                <span><?= $error['count'] ?? '' ?></span>
                            </div>
                        </div>
                        <div style="color:red">Tổng giá: <span id="total-price">0</span> VND</div>
                        <input type="hidden" id="totalPriceInput" value="">
                    </div>
                    <table class="table table-bordered" id="dataDetail" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Số sản phẩm còn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="imgpro"><img id="product-image" src="" width="80px"></td>
                                <td class="sizepro" id="product-size"></td>
                                <td class="pricepro" id="product-price"></td>
                                <td class="countpro" id="product-count"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <textarea class="form-control border" name="comment" placeholder="Nhập chú thích đơn hàng"></textarea>
                </div>
                <h4 class="mt-4">Thông tin khách hàng</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>Gmail khách hàng:</td>
                                <td><input type="text" value="<?= $post['gmail'] ?>" disabled><span style="color: red;">
                                <td><input type="hidden" name="gmail" value="<?= $post['gmail'] ?>"><span style="color: red;">
                            </tr>
                            <tr>
                                <td>SĐT khách hàng:</td>
                                <td><input type="number" value="<?= $post['phone'] ?>" disabled><span style="color: red;">
                                <td><input type="hidden" name="phone" value="<?= $post['phone'] ?>"><span style="color: red;">
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td><input type="text" value="<?= $post['address'] ?>" disabled><span style="color: red;">
                                <td><input type="hidden" name="address" value="<?= $post['address'] ?>"><span style="color: red;">
                            </tr>
                            <tr>
                                <td>Ship:</td>
                                <td>
                                    <select name="id_ship" disabled>
                                        <?php foreach ($ship as $i) { ?>
                                            <option value="{{$i->id}}" <?= ($i->id == $post['id_ship']) ? "selected" : '' ?>>{{$i->nameship}}
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="id_ship" value="<?= $post['id_ship'] ?>"><span style="color: red;">
                                </td>
                                <!-- FIX BUG ship ============================================================================ -->
                            </tr>
                            <tr>
                                <td><button class="btn btn-warning" type="submit" name="back" value="back">Quay
                                        lại</button></td>
                                <td><button class="btn btn-success" type="submit" name="order" value="order">Đặt
                                        hàng</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
</form>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('id_size');
        const countInputElement = document.getElementById('count-input');
        const totalPriceElement = document.getElementById('total-price');
        const detailProduct = <?php echo json_encode($detailProduct); ?>;

        function updateProductDetails() {
            const selectedId = selectElement.value;
            const selectedProduct = detailProduct.find(product => product.id == selectedId);

            if (selectedProduct) {
                document.getElementById('product-image').src = selectedProduct.image;
                document.getElementById('product-size').textContent = selectedProduct.size;
                document.getElementById('product-price').textContent = selectedProduct.price;
                document.getElementById('product-count').textContent = selectedProduct.count;
            }

            updateTotalPrice();
        }

        function updateTotalPrice() {
            const count = parseInt(countInputElement.value) || 0;
            const price = parseInt(document.getElementById('product-price').textContent) || 0;
            const totalPrice = count * price;
            document.getElementById('totalPriceInput').value = totalPrice;
            totalPriceElement.textContent = totalPrice.toLocaleString('vi-VN');
        }

        selectElement.addEventListener('change', updateProductDetails);
        countInputElement.addEventListener('input', updateTotalPrice);

        // Trigger the change event to initialize the table with the first product's details
        selectElement.dispatchEvent(new Event('change'));
    });
</script>
<!-- End of Main Content -->
@endsection