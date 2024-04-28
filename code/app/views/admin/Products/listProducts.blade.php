@extends('layout.main')
@section('content')
@foreach($countpro as $pro)
<h1 class="h3 mb-4 text-gray-800">Tất cả {{$pro}} loại sản phẩm trong kho: </h1>
@endforeach
<div class="btn btn-success me-5 mb-5 float-end ">Thêm sản phẩm mới vào kho</div>
<div class="container ps-5 pe-5">
    <table class=" table">
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Size</th>
            <th>Số lượng còn lại</th>
            <th>Thao tác</th>
        </tr>
        @foreach($storedetaiproduct as $de)
        <tr>
            <td>{{$de->id}}</td>
            <td><img src="{{$de->image}}" alt="" class="" width="100px"> </td>
            <td>{{$de->price}}</td>
            @foreach($size as $si)
            @if($si->id == $de->size)
            <td>{{$si->namesize}}</td>
            @endif
            @endforeach
            <td>{{$de->count}}</td>
            <td><button class="btn btn-warning "> <a href="{{route('edit-teacher')}}">Sửa</a> </button> <button class="btn btn-danger ">Xóa</button></td>
        </tr>

        @endforeach

    </table>
</div>

<br>



@endsection