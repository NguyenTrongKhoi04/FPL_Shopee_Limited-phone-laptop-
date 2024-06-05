@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa tài khoản</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('listAccount')}}"><button class="btn btn-primary mb-2">Danh sách tài khoản</button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Thông tin <sup style="color: red;">(mục * bắt buộc nhập)</sup></th>
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
                        <form action="{{route('updateAccount/'.$oneAccount[0]->id)}}" method="POST">
                            <input type="hidden" name="id" value="{{$oneAccount[0]->id}}">
                            <tr>
                                <td>Gmail<sup style="color: red;">(*)</sup></td>
                                <td><input type="text" name="gmail" value="{{$oneAccount[0]->gmail}}"><span
                                        style="color: red;">
                                        <?= $error['gmail'] ?? '' ?></span></td>
                            </tr>
                            <tr>
                                <td>Tên tài khoản<sup style="color: red;">(*)</sup></td>
                                <td><input type="text" name="username" value="{{$oneAccount[0]->username}}"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu<sup style="color: red;">(*)</sup></td>
                                <td><input type="password" name="password" value="{{$oneAccount[0]->password}}"></td>
                            </tr>
                            <tr>
                                <td>Ngày sinh</td>
                                <td><input type="date" name="birthday" value="{{$oneAccount[0]->birthday}}"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input type="text" name="address" value="{{$oneAccount[0]->address}}"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="number" name="phone" value="{{$oneAccount[0]->phone}}"></td>
                            </tr>
                            <tr>
                                <td>Vai trò</td>
                                <td>
                                    <?php $oneAccount[0]->role ?>
                                    <select name="role">
                                        <option value="1" <?= ($oneAccount[0]->role == 1) ? "selected" : " " ?>>admin
                                        </option>
                                        <option value="0" <?= ($oneAccount[0]->role == 0) ? "selected" : " " ?>>user
                                        </option>
                                    </select>
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