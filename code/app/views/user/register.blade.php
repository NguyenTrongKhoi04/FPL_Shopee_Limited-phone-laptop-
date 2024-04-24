@extends('layout.main')
@section('content')
<div class="modal d-flex ">
    <div class="modal__overlay"></div>
    <div class="modal__body">
        <div class="auth-form auth-form-register">
            <form action="" method="POST">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth__heading">Đăng ký</h3>
                        <a href="login.html" style="text-decoration: none;" class="auth-form__switch-btn">Đăng
                            nhập</a>
                    </div>
                    <div class="auth-form__group">
                        <label class="auth-form__group-label" for="email">Email:</label>
                        <input id="email" name="email" type="text" placeholder="Nhập email của bạn" class="auth-form__input">
                        <span class="auth-form__form-masage">
                            <?= isset($validate["email"]) ? $validate["email"] : ""; ?>
                        </span>
                    </div>
                    <div class="auth-form__group">
                        <label class="auth-form__group-label" for="password">Mật khẩu:</label>
                        <input id="password" name="password" type="password" placeholder="Nhập mật khẩu của bạn" class="auth-form__input">
                        <span class="auth-form__form-masage">
                            <?= isset($validate["password"]) ? $validate["password"] : ""; ?>
                        </span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group ">
                            <label class="auth-form__group-label" for="fullname">Tên hiển thị:</label>
                            <input id="fullname" name="fullname" type="text" placeholder="Nhập tên của bạn" class="auth-form__input">
                            <span class="auth-form__form-masage">
                                <?= isset($validate["fullname"]) ? $validate["fullname"] : ""; ?>
                            </span>
                        </div>
                        <div class="auth-form__group">
                            <label class="auth-form__group-label" for="phone">Số điện thoại:</label>
                            <input id="phone" name="phone" type="text" placeholder="Nhập số điện thoại của bạn" class="auth-form__input">
                            <span class="auth-form__form-masage">
                                <?= isset($validate["phoneNumber"]) ? $validate["phoneNumber"] : ""; ?>
                            </span>
                        </div>
                        <div class="auth-form__group">
                            <label class="auth-form__group-label" for="address">Địa chỉ:</label>
                            <input id="address" name="address" type="text" placeholder="Nhập địa chỉ của bạn" class="auth-form__input">
                            <span class="auth-form__form-masage">
                                <?= isset($validate["address"]) ? $validate["address"] : ""; ?>
                            </span>
                        </div>
                    </div>
                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng kí, bạn đã đồng ý với Fpoly về
                            <a href="" class="auth-form__text-link">Điều khoản dịch vụ </a>&
                            <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>
                    <div class="auth-form__controls">
                        <a href="../index.html" class="btn auth-form__controls-back btn--nomals">TRỞ VỀ</a>
                        <button type="submit" name="dangnhap" class="btn btn--primary">ĐĂNG KÝ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection