@extends('layout.main')
@section('content')
@if(isset($check))

<script>
    alert('{{$check}}')
</script>


@endif
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Đẩy lên cửa hàng</h1>
    <p>chọn loại hàng muốn up:</p>


    <ul class="nav nav-pills justify-content-center">
        @foreach($cate as $ca)

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{$ca->name_cate}}</a>
            <ul class="dropdown-menu">
                @foreach($subcate as $sub)
                @if($ca->id == $sub->id_category)
                <li><a class="dropdown-item"  href="{{route('upToShop/'.$sub->id)}}" >{{$sub->name_subcate}}</a></li>
                @endif
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
  


</div>
@endsection