@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tổng đơn <span style="color: orange;">({{$totalAllOrder[0]->count }})</span>
    </h1>
    <p class="mb-4">Tổng tất cả đơn hàng</p>

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
                            <th>Trạng thái đơn</th>
                            <th>Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tài khoản đặt</th>
                            <th>Thời gian đặt</th>
                            <th>Tổng tiền đơn</th>
                            <th>Trạng thái đơn</th>
                            <th>Xem chi tiết</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($listOrder as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td>
                                <?php
                                foreach ($listAccount as $acc) {
                                    if ($acc->id == $i->id_user) {
                                        echo $acc->username;
                                    }
                                }
                                ?>
                            </td>
                            <td><?= date('H:i:s d/m/Y', strtotime($i->time_order))  ?></td>
                            <td class="text-center">{{$i->totalorder}} $</td>
                            <td>
                                <?php
                                foreach ($listStatus as $st) {
                                    if ($st->id == $i->status) {
                                        echo $st->name;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a href="{{route('orderDetail/'.$i->id)}}" style="text-decoration: underline;">Chi
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
<!-- End of Main Content -->
@endsection