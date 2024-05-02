@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng đã hủy <span style="color: orangered;">
            (ID đơn: {{$orderDetail[0]->orders_id}})</span></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <!-- <h6 class="m-0 font-weight-bold text-primary"><a href="">linktest </a>DataTables Example</h6> -->
            <div>

                <a href="{{route('listReject')}}"><button class="btn btn-secondary">Trờ lại trang hủy hàng</button></a>
            </div>
            <h4 style="color: orangered;">Tổng tiền đơn hàng: {{$orderDetail[0]->totalorder}}$</a></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Ảnh</th>
                            <th>Size</th>
                            <th>Giá</th>
                            <th>Địa chỉ</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Ảnh</th>
                            <th>Size</th>
                            <th>Giá</th>
                            <th>Địa chỉ</th>
                            <th>Phone</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($orderDetail as $i)
                        <tr>
                            <td>{{$i->orderdetail_id}}</td>
                            <td>{{$i->namepro}}</td>
                            <td>{{$i->orderdetail_count}}</td>
                            <td><img src="{{$i->image}}" width="100px" alt=""></td>
                            <td>{{$i->namesize}}</td>
                            <td>{{$i->price * $i->orderdetail_count}}</td>
                            <td>{{$i->address}}</td>
                            <td>{{$i->phone}}</td>
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