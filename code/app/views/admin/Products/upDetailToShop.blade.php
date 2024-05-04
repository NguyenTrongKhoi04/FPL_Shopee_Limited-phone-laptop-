@extends('layout.main')
@section('content')
@if(isset($check))

<script>
    alert('{{$check}}')
</script>


@endif
<!-- <h1 class="h3 mb-4 text-gray-800">Các sản phẩm của {{$sub->name_subcate}}</h1> -->
<h1 class="h3 mb-4 text-gray-800">Chọn các biến thể cho sản phẩm vừa Up </h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Size</th>
            <th scope="col">Count</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detailPro as $sub)
        <tr>
            <td><img src="{{$sub->image}}" alt="" width="80px"></td>
            <td>{{$sub->price}}</td>
            <td>{{($sub->size)}}</td>
            <td>{{($sub->count)}}</td>
            <td><button class="btn btn-success" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#up{{$sub->id}}">Up</button></td>
            <div class="modal fade" id="up{{$sub->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="up"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('submitUp')}}" method="">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" id="" value="{{$sub->price}}" min="{{$sub->price}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Số lượng </label>
                                    <input type="number" name="count" class="form-control" id="" value="{{$sub->count}}" max="{{$sub->count}}" min="1">
                                </div>
                                <button type="button" class="btn btn-success">Push</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
        @endforeach
    </tbody>
</table>



















@endsection