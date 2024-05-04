@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Đơn Hủy <span
            style="color: orange;">({{$totalOrderReject[0]->count }})</span>
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
                <span class="mx-3"><input type="checkbox" name="" id="cancel-admin-checkbox"
                        style="transform: scale(1.5);"> Các đơn shop hủy
                </span>
                <input type="checkbox" name="" id="cancel-user-checkbox" style="transform: scale(1.5);"> Các đơn
                khách hàng hủy
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản đặt</th>
                            <th>Thời gian đặt</th>
                            <th>Thời gian hủy</th>
                            <th>Lý do hủy</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản đặt</th>
                            <th>Thời gian đặt</th>
                            <th>Thời gian hủy</th>
                            <th>Lý do hủy</th>
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
                                <?php
                                if ($i->status == 9) {
                                    echo "Shop không xác nhận đơn hàng";
                                } else {
                                    foreach ($listReasonReject as $v) {
                                        if ($i->reason_reject == $v->id) {
                                            echo  $v->name;
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a style="text-decoration: underline;"
                                    href="{{route('orderDetailReject/'.$i->order_id)}}">Chi
                                    tiết
                                    đơn hàng</a>

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
// Lấy thời gian hoàn thành dự kiến từ thuộc tính data-set-countdown của phần tử HTML
var countdownElements = document.querySelectorAll('[data-set-countdown]');
countdownElements.forEach(function(element) {
    var targetTimeString = element.dataset.setCountdown;
    var targetTime = new Date(targetTimeString);
    updateCountdown(element, targetTime);
});

// Hàm cập nhật đồng hồ đếm ngược
function updateCountdown(element, targetTime) {
    function update() {
        var now = new Date();

        // console.log(now, targetTime);
        var distance = (targetTime.getTime() - now.getTime());

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // element.innerHTML = days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's ';
        element.innerHTML = days + 'd ' + hours + 'h ' + minutes + 'm';

        if (distance > 0) {
            setTimeout(update, 1000); // Cập nhật lại sau mỗi giây
        } else {
            element.innerHTML = 'Hoàn Thành';
        }
    }

    update();
}

const checkboxItem = function(nameButton, dataset) {
    document.getElementById(nameButton).addEventListener('change', function() {
        let rows = document.querySelectorAll(`tr[data-set="${dataset}"]`);
        console.log(this, dataset);
        rows.forEach(function(row) {
            if (row.style.display === 'none') {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}

checkboxItem('cancel-user-checkbox', 6);
checkboxItem('cancel-admin-checkbox', 9);
</script>
<!-- End of Main Content -->
@endsection