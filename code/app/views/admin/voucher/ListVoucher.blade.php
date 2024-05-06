@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách Voucher</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('addVoucher')}}"><button class="btn btn-success mb-2">Thêm voucher</button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã Voucher</th>
                            <th>Tên Voucher</th>
                            <th>Giá trị Voucher</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Mã Voucher</th>
                            <th>Tên Voucher</th>
                            <th>Giá trị Voucher</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($allVoucher as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td>{{$i->codevoucher}}</td>
                            <td>{{$i->namevoucher}}</td>
                            <td>{{$i->valuevoucher}}</td>
                            <td>
                                <?= ($i->countvoucher <=0)? "Đã hết" : $i->countvoucher ; ?>
                            <td>
                                <a href="{{route('deleteVoucher/'.$i->id)}}">
                                    <button onclick=" return confirm('Chắc chắn dừng mã voucher này')"
                                        class="btn btn-danger">Dừng Voucher</button></a>
                            </td>
                        </tr>
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