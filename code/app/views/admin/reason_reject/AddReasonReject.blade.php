@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm lý do hủy</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('listReasonReject')}}"><button class="btn btn-primary mb-2">Danh sách lý do hủy hiện
                    tại</button></a>
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
                        <form action="{{route('addReasonReject')}}" method="POST">
                            <tr>
                                <td>Tên sale<sup style="color: red;">(* không nhập lý do đã có)</sup></td>
                                <td>
                                    <input type="text" name="name">
                                    <span style="color: red;">
                                        <?= $error['name'] ?? '' ?>
                                    </span>
                                </td>
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