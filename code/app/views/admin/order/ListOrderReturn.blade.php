@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800">Đơn Hủy <span
            style="color: orange;">({{$totalOrderRequestConfirm[0]->count }})</span>

    <!-- <h1 class="h3 mb-2 text-gray-800">Đơn Hoàn Trả <span
            style="color: orange;">({{$totalOrderReturn[0]->count }})</span> -->

    </h1>
    <p class="mb-4">Các đơn hàng dã bị hủy</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('listAllOrder')}}"><button class="btn btn-secondary">Tất cả
                    ({{$totalAllOrder[0]->count ?? 0}})</button></a>
            <a href="{{route('listRequestConfirm')}}"><button class="btn btn-primary">Đơn chờ xác nhận
                    ({{$totalOrderRequestConfirm[0]->count?? 0}})</button></a>
            <a href="{{route('listConfirm')}}"><button class="btn btn-dark">Đơn đang chuẩn
                    bị ({{$totalOrderConfirm[0]->count ?? 0}})</button></a>
            <a href="{{route('listTransfer')}}"><button class="btn btn-info">Đơn đang giao
                    ({{$totalOrderTransfer[0]->count ?? 0}})</button></a>
            <a href="{{route('listSuccess')}}"><button class="btn btn-success">Đơn hoàn thành
                    ({{$totalOrderSuccess[0]->count ?? 0}})</button></a>
            <a href="{{route('listReject')}}"><button class="btn btn-warning">Đơn hủy
                    ({{$totalOrderReject[0]->count ?? 0}})</button></a>
            <a href="{{route('listReturn')}}"><button class="btn btn-danger">Đơn hoàn trả
                    ({{$totalOrderReturn[0]->count ?? 0}})</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <span class="mx-3"><input type="checkbox" name="" id="cancel-confirm-checkbox"
                        style="transform: scale(1.5);"> Các đơn hoàn trả
                    thành công
                </span>
                <input type="checkbox" name="" id="cancel-success-checkbox" style="transform: scale(1.5);"> Các đơn chưa
                xác
                nhận hoàn trả
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản đặt</th>
                            <th>Thời gian đặt</th>
                            <th>Thời gian giao thành công</th>
                            <th>Lý do hoàn trả</th>
                            <th>Chi tiết</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản đặt</th>
                            <th>Thời gian đặt</th>
                            <th>Thời gian giao thành công</th>
                            <th>Lý do hoàn trả</th>
                            <th>Chi tiết</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($listOrder as $i)
                        <tr data-set="<?= $i->status ?>">
                            <td>{{$i->order_id}}</td>
                            <td>{{$i->username}}</td>
                            <td><?= date('H:i:s d/m/Y', strtotime($i->time_order)) ?></td>
                            <td><?= date('H:i:s d/m/Y', strtotime($i->time_complete)) ?></td>
                            <td>
                                {{$i->reason_return}}
                            </td>
                            <td>
                                <a style="text-decoration: underline;"
<<<<<<< HEAD
                                    href="{{route('orderDetailSuccess/'.$i->order_id)}}">Chi
=======
                                    href="{{route('orderDetailReturn/'.$i->order_id)}}">Chi
>>>>>>> BuiDucNinh
                                    tiết
                                    đơn hàng</a>
                            </td>
                            <td>
                                <?php if ($i->status == 7) { ?>
<<<<<<< HEAD
                                <a href=""><button class="btn btn-success">Xác nhận hoàn trả</button></a>
=======
                                <a href="{{route('confirmReturn/'.$i->order_id)}}">
                                    <button onclick=" return confirm('Chắc chắn đồng ý hoàn trả')"
                                        class="btn btn-success">Xác nhận hoàn trả</button></a>
>>>>>>> BuiDucNinh
                                <?php } else {
                                    echo "Đã xác nhận";
                                } ?>
                            </td>
                        <tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<script>
const checkboxItem = function(nameButton, dataset) {
    document.getElementById(nameButton).addEventListener('change', function() {
<<<<<<< HEAD

        let rows = document.querySelectorAll(`tr[data-set="${dataset}"]`);
        console.log(this, dataset);
        let listCheckbox = document.querySelectorAll('input[type="checkbox"]');

        listCheckbox.forEach((oneInput) => {
            if (oneInput !== this) {
                oneInput.checked = false;
                rows.forEach(function(row) {
                    row.style.display = 'none';
                });
            }
        })

        if (this.checked) {
            rows.forEach(function(row) {
                row.style.display = 'none';
            });
        } else {
            rows.forEach(function(row) {
                row.style.display = '';
            });
        }
=======
        let rows = document.querySelectorAll(`tr[data-set="${dataset}"]`);
        console.log(this, dataset);
        rows.forEach(function(row) {
            if (row.style.display === 'none') {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
>>>>>>> BuiDucNinh
    });
}

checkboxItem('cancel-success-checkbox', 8);
checkboxItem('cancel-confirm-checkbox', 7);
</script>
<<<<<<< HEAD
=======

>>>>>>> BuiDucNinh
<!-- End of Main Content -->
@endsection