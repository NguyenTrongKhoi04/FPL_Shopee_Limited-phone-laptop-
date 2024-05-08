@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm Ship</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('listShip')}}"><button class="btn btn-primary mb-2">Danh sách ship</button></a>
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
                        <form action="{{route('addShip')}}" method="POST">
                            <tr>
                                <td>Tên sale</td>
                                <td>
                                    <input type="text" name="nameship">
                                    <span style="color: red;">
                                        <?= $error['nameship'] ?? '' ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>Thời gian ship <sup style="color: red;">(* lớn hơn 15p)</sup></td>
                                <td><input type="number" name="timeship"></td>
                            </tr>
                            <tr>
                                <td>Giá Ship<sup style="color: red;">(* lớn hơn 0)</sup>
                                <td><input type="number" name="priceship"></td>
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