@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm Voucher</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('listVoucher')}}"><button class="btn btn-primary mb-2">Danh sách Voucher</button></a>
            <span><?= $error['namevoucher'] ?? ''?></span>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Dữ liệu nhập vào</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Dữ liệu nhập vào</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <form action="{{route('addVoucher')}}" method="POST">
                            <tr>
                                <td>Tên voucher</td>
                                <td><input type="text" name="namevoucher"></td>
                            </tr>
                            <tr>
                                <td>Phần trăm giảm giá (%)</td>
                                <td><input type="number" min="1" max="100" placeholder="Nhập giá trị"
                                        name="valuevoucher" style="width: 110px;">
                                </td>
                            </tr>
                            <tr>
                                <td>Số lượng voucher</td>
                                <td><input type="number" name="countvoucher"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-success" type="submit">Thêm</button></td>
                            </tr>
                        </form>
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