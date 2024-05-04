@extends('layout.main')
@section('content')
@if(isset($check))

<script>
    alert('{{$check}}')
</script>


@endif
<!-- <h1 class="h3 mb-4 text-gray-800">Các sản phẩm của {{$sub->name_subcate}}</h1> -->
<h1 class="h3 mb-4 text-gray-800">Danh sách tài khoản</h1>

<button class="btn btn-success float-end mb-3 me-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Account</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tạo tài khoản Admin mới</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('addAccount')}}" method="post" name="addForm">
                <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="gmail" class="form-control" id="" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên Tài khoản</label>
                        <input type="text" name="username" class="form-control" id="" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
                        <input type="text" name="password" class="form-control" id="" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ngày sinh</label>
                        <input type="date" name="birthday" class="form-control" id="" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa Chỉ </label>
                        <input type="text" name="address" class="form-control" id="" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Số Điện Thoại</label>
                        <input type="number" name="phone" class="form-control" id="" value="">
                    </div>
                    <button type="submit" name="btn-submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <table class=" table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Gmail</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">CreateTime</th>
                <th scope="col">Birthday</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($account as $acc)
            <tr>
                <td>{{$acc->id}}</td>
                <td>{{$acc->gmail}}</td>
                <td>{{$acc->username}}</td>
                <td>{{$acc->password}}</td>
                <td><?= ($acc->role == 0) ? 'Client' : 'Admin'  ?></td>
                <td>{{$acc->createtime}}</td>
                <td>{{$acc->birthday}}</td>
                <td>{{$acc->address}}</td>
                <td>{{$acc->phone}}</td>
                <td><a onclick="confirm('bạn có chắc xóa tài khoản này này')" href="{{route('deleteAccount/'.$acc->id)}}"><button class="btn btn-danger">Delete</button></a></td>

            </tr>
            @endforeach
        </tbody>
    </table>



</div>
@endsection