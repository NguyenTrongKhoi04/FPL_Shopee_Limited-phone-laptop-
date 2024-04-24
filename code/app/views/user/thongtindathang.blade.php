@extends('layout.main')
@section('content')
<div class="main-content">
    <div class="card-body">
        <h4 class="card-title text-center h1 my-5">Thông tin đặt hàng</h4>
        <div class="card-body">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="row d-flex align-items-center ">
                    <div class="col-md-6 ">
                        <div class="form-group my-3 ">
                            Email:
                            <span class="form-control">
                                Nguyễn Văn A"@"gmail.com
                            </span>
                        </div>
                        <div class="form-group my-3">
                            Ho Tên :
                            <span class="form-control">
                                Nguyễn Văn A
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group my-3">
                            Địa chỉ:
                            <span class="form-control">
                                Hà nội
                            </span>
                        </div>
                        <div class="form-group my-3">
                            Số điện thoại:
                            <span class="form-control">
                                0932919321
                            </span>
                        </div>
                    </div>
                    <div class="my-5">
                        <input type="submit" value="Đặt hàng" name="thongtindathang" class="btn btn-success">
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection