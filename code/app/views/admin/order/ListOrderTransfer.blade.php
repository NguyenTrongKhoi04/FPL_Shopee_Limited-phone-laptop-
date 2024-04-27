@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Đơn Đang Chuẩn Bị <span
            style="color: orange;">({{$totalOrderRequestConfirm[0]->count }})</span>
    </h1>
    <p class="mb-4">Xác nhận các đơn hàng được khách hàng đặt</p>

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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản đặt</th>
                            <th>Thời gian bắt đầu giao đơn</th>
                            <th>Tổng tiền đơn</th>
                            <th>Đếm ngược</th>
                            <th>Dự tính thời gian giao thành công</th>
                            <th>Tên ship</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản đặt</th>
                            <th>Thời gian bắt đầu giao đơn</th>
                            <th>Tổng tiền đơn</th>
                            <th>Đếm ngược</th>
                            <th>Dự tính thời gian giao thành công</th>
                            <th>Tên ship</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($listOrder as $i)
                        <tr>
                            <td>{{$i->order_id}}</td>
                            <td>{{$i->username}}</td>
                            <td><?= date('H:i:s d/m/Y', strtotime($i->time_complete)) ?></td>
                            <td class="text-center">{{$i->totalorder}} $</td>
                            <td style="color:orangered;">
                                <?php
                                foreach ($listShip as $v) {
                                    if ($v->id == $i->id_ship) {
                                    }
                                }
                                ?></td>
                            <td>
                            <td data-set-countdown="<?= $i->time_complete ?>"></td>
                            <td><?= $i->time_complete ?></td>

                            <?php foreach ($listShip as $v) {
                                if ($v->id == $i->id_ship) {
                                    $newTime = date('H:i:s d/m/Y', strtotime($i->time_complete) + $v->timeship * 60);
                                    echo $newTime;
                                }
                            }
                            ?>
                            </td>
                            <td class=" text-center">
                                <?php
                                foreach ($listShip as $v) {
                                    if ($v->id == $i->id_ship) {
                                        echo $v->nameship;
                                    }
                                }
                                ?>
                            </td>
                            <td class="text-center" <?= ($i->countcomment > 0) ? 'style="color: orange;"' : ''  ?>>
                                {{$i->countcomment}}
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

        element.innerHTML = days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's ';

        if (distance > 0) {
            setTimeout(update, 1000); // Cập nhật lại sau mỗi giây
        } else {
            element.innerHTML = 'Expired';
        }
    }

    update();
}
</script>
<!-- End of Main Content -->
@endsection