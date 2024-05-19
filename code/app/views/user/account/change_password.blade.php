@extends('layout.main')
@section('content')
<div class="app__container">
    <div class="grid grid__information">
        <div class="text-center">
            <h2 class="information-heading-text">Cập nhật mật khẩu</h2>
        </div>
        <form action="{{route('change-pass')}}" class="information grid__row" method="POST"
            enctype="multipart/form-data">
            <ul class="list__information">
                <li class="list__information-item">
                    <span class="information__name-change">Mật khẩu hiện tại:</span>
                    <div class="information__input-change">
                        <input type="password" name="password_old" value="<?= $_POST['password_old'] ?? '' ?>" />
                        <span style="color: red;"><?= $errors['password_old'] ?? '' ?></span>
                    </div>
                </li>
                <li class="list__information-item">
                    <span class="information__name-change">Mật khẩu mới:</span>
                    <div class="information__input-change">
                        <input type="password" name="password_new" value="<?= $_POST['password_new'] ?? '' ?>">
                        <span style="color: red;"><?= $errors['password_new'] ?? '' ?></span>
                    </div>
                </li>
                <li class="list__information-item">
                    <span class="information__name-change">Nhập lại mật khẩu:</span>
                    <div class="information__input-change">
                        <input type="password" name="password_new_confirm"
                            value="<?= $_POST['password_new_confirm'] ?? '' ?>">
                        <span style="color: red;"><?= $errors['password_new_confirm'] ?? '' ?></span>
                    </div>
                </li>
            </ul>
            <div class="btn__information-update">
                <button type="submit" name="update" value="update" class="btn btn-success me-3">Cập nhật</button>
                <button type="submit" name="forgot_pass" value="forgot_pass" class="btn btn-warning">Lấy lại mật
                    khẩu</button>
            </div>
        </form>
    </div>
</div>
@endsection