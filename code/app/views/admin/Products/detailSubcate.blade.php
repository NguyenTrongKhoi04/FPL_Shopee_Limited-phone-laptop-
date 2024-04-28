@extends('layout.main')
@section('content')
@if(isset($check))

<script>
    alert('{{$check}}')
</script>


@endif
<h1>Chỉnh sửa danh mục</h1>

<form action="{{route('updateSubcate/'.$oneSub->id)}}" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
        <input type="text" name="name_subcate" class="form-control" id="" value="{{$oneSub->name_subcate}}">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Loại sản phẩm</label>
        <select class="rounded " name="id_category" id="">
            @foreach($cate as $ca)
            <option class="rounded " value="{{$ca->id}}" <?= ($ca->id == $oneSub->id_category) ? 'selected' : ""  ?>>{{$ca->name_cate}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" name="btn-submit" class="btn btn-success">Submit</button>
</form>









@endsection