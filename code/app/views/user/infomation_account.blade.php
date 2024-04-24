@extends('layout.main')
@section('content')
<div class="app__container">
    <div class="grid grid__information">
        <div class="information-heading">
            <p class="information-heading-text">Thông tin cá nhân</p>
        </div>
        <form action="" class="information grid__row" method="POST" enctype="multipart/form-data">
            <div class="grid__column-3 information__avt">
                <div class="information-avatar">
                    <div class="information-image">
                        <img src="../assets/img/avtgithub.png" alt="" class="information-image__img">
                    </div>
                    <span class="btn information-avatar__change">
                        <input class="btn" name="image" type="file" accept="image/*">
                    </span>
                </div>
            </div>
            <div class="grid__column-9">
                <ul class="list__information">
                    <li class="list__information-item">
                        <span class="information__name-change">Tên người dùng :</span>
                        <div class="information__input-change">
                            <input type="text" name="fullname" value="Nguyễn Văn A">
                            <div class="text_update_validate">
                                <p>
                                    Validate
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="list__information-item">
                        <span class="information__name-change ">Email:</span>
                        <div class="information__input-change">
                            <input type="text" readonly name="email" value="Email@gmail.com">

                        </div>
                    </li>
                    <li class="list__information-item">
                        <span class="information__name-change">Địa chỉ :</span>
                        <div class="information__input-change">
                            <input type="text" name="address" value="Hà nội">
                            <div class="text_update_validate">
                                <p>
                                    Validate
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="list__information-item">
                        <span class="information__name-change">Số điện thoại :</span>
                        <div class="information__input-change">
                            <input type="text" name="numberPhone" value="09663219321">
                            <div class="text_update_validate">
                                <p>
                                    Validate
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="list__information-item">
                        <span class="information__name-change">Tên tài khoản :</span>
                        <div class="information__input-change">
                            <input type="text" class="nameAccount" name="nameAccount" value="Nguyen Van A">
                            <div class="text_update_validate">
                                <p>
                                    Validate
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="btn__information-update">
                <button type="submit" name="update" class="btn btn__information-update-ok">Cập nhật</button>
                <button type="reset" class="btn btn__information-reset">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection