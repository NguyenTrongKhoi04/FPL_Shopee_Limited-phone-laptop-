@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Đơn Chờ Xác Nhận</h1>
    <p class="mb-4">Xác nhận các đơn hàng được khách hàng đặt</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="">linktest </a>DataTables Example</h6>
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
                            <th>Giảm giá voucher</th>
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
                            <th>Giảm giá voucher</th>
                            <th>Comment đơn hàng</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($listOrder as $i)
                        <tr>
                            <td>{{$i->order_id}}</td>
                            <td>{{$i->username}}</td>
                            <td>{{$i->time_order}}</td>
                            <td>{{$i->totalorder}}</td>
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
                            <td>{{$i->countcomment}}</td>
                            <td>
                                <a href="{{route('orderdetail/'.$i->order_id)}}"><button class="btn btn-success">Chi
                                        tiết
                                        đơn hàng</button></a>
                                <a href="{{route('confirmorder/'.$i->order_id)}}">
                                    <button onclick=" return confirm('Chắc chắn xác nhận đơn hàng')"
                                        class="btn btn-primary">Xác nhận</button></a>
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