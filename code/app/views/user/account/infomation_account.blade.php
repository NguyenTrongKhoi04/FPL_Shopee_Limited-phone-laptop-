@extends('layout.main')
@section('content')
<div class="app__container w-75 mx-auto my-5" style="background-color: white;">
    <form action="{{route('change-info-acccount')}}" method="POST" enctype="multipart/form-data">
        <div class="mx-auto text-center w-75 mb-5">
            <h1 class="">Thông tin cá nhân </h1>
        </div>

        <div class="mx-auto w-75">
            <div>
                <span class="form-label fs-3">Tên người dùng</span>
                <input type="text" name="username" value="{{$account->username}}" class="form-control">
                <span class="fs-5" style="color: red;"> <?= $errors['username'] ?? "" ?></span>
            </div>
            <div>
                <label class="form-label fs-3 mt-3">Gmail</label>
                <input type="text" disabled value="{{$account->gmail}}" class=" form-control">
                <input type="hidden" name="gmail" value="{{$account->gmail}}">
            </div>
            <div>
                <label class="form-label fs-3 mt-3">Só điện thoại</label>
                <input type="number" value="{{$account->phone}}" name="phone" class=" form-control">
                <span class="fs-5" style="color: red;"> <?= $errors['phone'] ?? "" ?></span>
            </div>
            <div>
                <label class="form-label fs-3 mt-3">Địa chỉ</label>
                <input type="text" value="{{$account->address}}" name="address" class="form-control">
                <span class="fs-5" style="color: red;"> <?= $errors['address'] ?? "" ?></span>
            </div>
            <div>
                <label class="form-label fs-3 mt-3">Ngày sinh</label>
                <input type="date" value="{{$account->birthday}}" name="birthday" class="form-control">
                <span class="fs-5" style="color: red;"> <?= $errors['birthday'] ?? "" ?></span>
            </div>
            <input type="hidden" value="{{$account->id}}" name="id">
        </div>
        <div class="mx-auto w-25 d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-success ">Lưu thông tin</button>
        </div>
    </form>
    <div class="text-center mt-2">
        <a href="{{route('change-pass')}}"><input type="button" class="btn btn-primary" value="Đổi mật khẩu">
    </div>
</div>
@endsection