@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách tài khoản</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('addAccount')}}"><button class="btn btn-success mb-2">Thêm tài khoản</button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên tài khoản</th>
                            <th>Gmail</th>
                            <th>Địa chỉ</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên tài khoản</th>
                            <th>Gmail</th>
                            <th>Địa chỉ</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($allAcc as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td>{{$i->username}}</td>
                            <td>{{$i->gmail}}</td>
                            <td>{{$i->address}}</td>
                            <td><?= date('d/m/Y', strtotime($i->birthday)) ?></td>
                            <td>{{$i->phone}}</td>
                            <td><?php if($i->role != 2){ 
                                    echo ($i->role == 1) ? "admin" : "user"; 
                                }else{
                                    echo "không hoạt động";
                                } ?></td>
                            <td>
                                <a href="{{route('updateAccount/'.$i->id)}}">
                                    <button class="btn btn-primary">Sửa</button></a>
                                <a href="{{route('stopAccount/'.$i->id)}}">
                                    <button onclick=" return confirm('Chắc chắn xác nhận tạm dừng vĩnh viễn tài khoản')"
                                        class="btn btn-danger">tạm dừng hoạt động</button></a>
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