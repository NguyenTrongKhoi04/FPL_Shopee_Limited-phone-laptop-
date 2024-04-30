@extends('layout.main')
@section('content')
<div class="app__container">
    <div class="grid grid__information bg-success-subtle  ">
        <div class="information-heading ">
            <p class="information-heading-text h2">Thông tin cá nhân</p>
        </div>
        <form action="{{route('change-info-acccount')}}" class="information grid__row" method="POST" enctype="multipart/form-data">
            <div class="grid__column-3 information__avt border-0 ">
                <div class="information-avatar">
                    <div class="information-image">
                        <img src="{{BASE_URL.'public/user/assets/img_user/avtgithub.png'}}" alt="" class="information-image__img ">
                    </div>
                </div>
            </div>
            <div class="grid__column-9">
                <ul class="list__information">
                    <li class="list__information-item">
                        <span class="information__name-change">Tên người dùng :</span>
                        <div class="information__input-change">
                            <input type="text" name="username" value="{{$account->username}}">
                        </div>
                        <div class="text_update_validate">
                            <p class="text-danger h5 ms-3">
                                <?= $errors['username'] ?? "" ?>
                            </p>
                        </div>
                    </li>
                    <li class="list__information-item">
                        <span class="information__name-change ">Gmail:</span>
                        <div class="information__input-change bg-light ">
                            <input type="text" disabled value="{{$account->gmail}}">
                        </div>
                        <input type="hidden" name="gmail" value="{{$account->gmail}}">
                    </li>
                    <li class="list__information-item">
                        <span class="information__name-change">Địa chỉ :</span>
                        <div class="information__input-change">
                            <input type="text" name="address" value="{{$account->address}}">
                        </div>
                        <div class="text_update_validate">
                            <p class="text-danger h5 ms-3">
                                <?= $errors['address'] ?? "" ?>
                            </p>
                        </div>
                    </li>
                    <li class="list__information-item">
                        <span class="information__name-change">Mật khẩu hiện tại :</span>
                        <div class="information__input-change">
                            <input type="text" name="password">
                        </div>
                        <div class="text_update_validate">
                            <p class="text-danger h5 ms-3">
                                <?= $errors['pass'] ?? "" ?>
                            </p>
                        </div>
                    </li>
                    <li class="list__information-item">
                        <span class="information__name-change">Mật khẩu muốn đổi :</span>
                        <div class="information__input-change">
                            <input type="text" class="nameAccount" name="newpassword">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="btn__information-update">
                <button type="submit" name="update" class="btn btn-warning">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection