@extends('layout.main')
@section('content')
<div class=" d-flex ">
    <div class="modal__body">
        <div class="auth-form bg-warning-subtle pb-3 my-3">
            <form action="{{route('login-request/')}}" method="POST">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth__heading">Đăng nhập</h3>
                        <a href="{{route('register/')}}" style="text-decoration: none;"
                            class="auth-form__switch-btn">Đăng ký</a>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <label class="auth-form__group-label" for="email">Email:</label>
                            <input name="gmail" type="text" placeholder="Nhập email của bạn" class="auth-form__input">
                            <span class="auth-form__form-masage">
                                @if(isset($errors['gmail']['requied']))
                                {{$errors['gmail']['requied']}}
                                @elseif(isset($errors['gmail']['invaild']))
                                {{isset($errors['gmail']['invaild'])}}
                                @endif
                            </span>
                        </div>
                        <div class="auth-form__group">
                            <label class="auth-form__group-label" for="password">Mật khẩu:</label>
                            <input name="password" type="password" placeholder="Nhập mật khẩu của bạn"
                                class="auth-form__input">
                            <span class="auth-form__form-masage">
                                Validate
                            </span>
                        </div>
                    </div>
                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="{{route('forgot-pass/')}}" class="auth-form__help-link auth-form__help-forgot">Quên
                                mật khẩu</a>
                        </div>
                    </div>
                    <div class="auth-form__controls">
                        <a href="{{route('product/')}}"
                            class="btn align-content-center bg-light   auth-form__controls-back btn--nomals">TRỞ VỀ</a>
                        <button name="login" type="submit" class="btn hov btn--primary">ĐĂNG NHẬP</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection