@extends('layout.main')
@section('content')
<div class="app__container">
    <div class="grid grid__information">
        <div class="information-heading">
            <p class="information-heading-text">Cập nhật mật khẩu</p>
        </div>
        <form action="" class="information grid__row" method="POST" enctype="multipart/form-data">
            <ul class="list__information">
                <li class="list__information-item">
                    <span class="information__name-change">Tên người dùng :</span>
                    <div class="information__input-change">
                        <input type="text" name="" style="cursor: default;" readonly value="Nguyễn Văn A">
                    </div>
                </li>
                <li class="list__information-item">
                    <span class="information__name-change ">Email:</span>
                    <div class="information__input-change">
                        <input class="notemail" type="text" style="cursor: default;" readonly name="" value="email@gamil.com">
                    </div>
                </li>
                <li class="list__information-item">
                    <span class="information__name-change">Tên tài khoản :</span>
                    <div class="information__input-change">
                        <input type="text" name="" style="cursor: default;" readonly value="Nguyễn Văn A">
                    </div>
                </li>
                <li class="list__information-item">
                    <span class="information__name-change">Mật khẩu cũ:</span>
                    <div class="information__input-change">
                        <input type="password" name="password_old">
                        <p>
                            <?= isset($ValidCP["PasswordOld"]) ? $ValidCP["PasswordOld"] : "" ?>
                        </p>
                    </div>
                </li>
                <li class="list__information-item">
                    <span class="information__name-change">Mật khẩu mới:</span>
                    <div class="information__input-change">
                        <input type="password" name="password_new1">
                        <p>
                            <?= isset($ValidCP["PasswordNew1"]) ? $ValidCP["PasswordNew1"] : "" ?>
                        </p>
                    </div>
                </li>
                <li class="list__information-item">
                    <span class="information__name-change">Nhập lại mật khẩu:</span>
                    <div class="information__input-change">
                        <input type="password" name="password_new2">
                        <p>
                            <?= isset($ValidCP["PasswordNew2"]) ? $ValidCP["PasswordNew2"] : "" ?>
                        </p>
                    </div>
                </li>
            </ul>
            <div class="btn__information-update">
                <button type="submit" name="update" class="btn btn__information-update-ok">Cập nhật</button>
                <button type="reset" class="btn btn__information-reset">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection