@extends('layout.main')
@section('content')
<div class="main-content">
    <div class="card-body container ">
        <h4 class="card-title text-center h1 my-5">Quản lý mua hàng tại quầy</h4>

        @if(isset($productStaff))
        @foreach($productStaff as $pro)
        <h1>{{$pro->namepro}}</h1>
        
        @endforeach

        @else
        <form action="{{route('subIndexStaff')}}" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Tên sản phẩm:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter name" name="name_pro">
                </div>
               
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        
        @endif
    </div>
</div>
<br> <br>
@endsection