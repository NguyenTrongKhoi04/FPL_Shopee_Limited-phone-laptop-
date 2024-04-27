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
                            <th>Thời gian đặt</th>
                            <th>Tổng tiền đơn</th>
                            <th>Dự tính thời gian giao thành công</th>
                            <th>Ship</th>
                            <th>Comment đơn hàng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản đặt</th>
                            <th>Thời gian đặt</th>
                            <th>Tổng tiền đơn</th>
                            <th>Dự tính thời gian giao thành công</th>
                            <th>Ship</th>
                            <th>Comment đơn hàng</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($listOrder as $i)
                        <tr>
                            <td>{{$i->order_id}}</td>
                            <td>{{$i->username}}</td>
                            <td><?= date('H:i:s d/m/Y', strtotime($i->time_order)) ?></td>
                            <td class="text-center">{{$i->totalorder}} $</td>
                            <td>
                                <?php
                                if ($i->id_voucher != 0) {
                                    foreach ($listVoucher as $v) {
                                        if ($v->id == $i->id_voucher) {
                                            echo $v->valuevoucher . "%";
                                        }
                                    }
                                } else {
                                    echo "không voucher";
                                }
                                ?>
                            </td>
                            <td class="text-center">
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
                            <td>
                                <a href="{{route('orderDetail/'.$i->order_id)}}"><button class="btn btn-primary">Chi
                                        tiết
                                        đơn hàng</button></a>
                                <a href="{{route('confirmOrder/'.$i->order_id)}}">
                                    <button onclick=" return confirm('Chắc chắn xác nhận đơn hàng')"
                                        class="btn btn-success">Vận chuyển</button></a>
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
<!-- End of Main Content -->
@endsection