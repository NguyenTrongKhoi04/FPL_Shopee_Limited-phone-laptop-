@extends('layout.main')
@section('content')
@if(isset($check))

<script>
alert('{{$check}}')
</script>


@endif

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Danh sách các sản phẩm: </h1>
    <div class="float-end mb-3">
        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm mới chi tiết
            sản phẩm</button>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-xxl-5" id="exampleModalLabel">Thêm mới sản phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('insertStoreDetailProduct')}}" method="post" name="addForm">
                        <div class="mb-3">
                            <input type="hidden" name="id_pro" value="{{$p->id_pro}}">
                            <label for="exampleInputEmail1" class="form-label">Image</label>
                            <input type="text" name="image" class="form-control" id="" value="" placeholder="link ảnh">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="" value="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Size</label>
                            <select class="rounded " name="size" id="">
                                @foreach($size as $sub)
                                <option class="rounded " value="{{$sub->id}}">{{$sub->namesize}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" name="btn-submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Size</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detailProducts as $p)

            <tr>
                <td>{{$p->id_detail}}</td>
                <td><img src="{{$p->image}}" alt="" width="80px"></td>
                <td>{{$p->price}}</td>
                <td>{{$p->namesize}}</td>
                <td>
                    <button class="btn btn-warning" style="font-size: 10px;" data-bs-toggle="modal"
                        data-bs-target="#updateProduct{{$p->id_detail}}">
                        Update
                    </button> <br>
                    <a href="{{route('deleteStoreDetailProduct/'.$p->id_detail)}}"> <button onclick="confirm('bạn có chắc muốn xóa')"
                            class="btn btn-danger " style="font-size: 10px;""> 
                        Delete
                    </button>
                    </a>
                </td>
            </tr>
            <!-- modal update product -->
            <div class=" modal fade" id="updateProduct{{$p->id_detail}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Edit</b> 
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('edit-storeDetailProduct/'.$p->id_detail)}}" method="post">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Hình ảnh</label>
                                                <img src="{{$p->image}}" alt="" width="80px">
                                                <input type="text" name="image" class="form-control" id="" placeholder="nhập link ảnh">
                                                    
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Giá</label>
                                                <input type="number" name="price" class="form-control" id=""
                                                    value="{{$p->price}}">
                                            </div>
                                            
                                            
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Size</label>
                                                <select class="rounded " name="size" id="">
                                                    @foreach($size as $sub)
                                                    <option class="rounded " value="{{$sub->id}}"
                                                        <?= ($sub->id == $p->size) ? 'selected' : ""  ?>>
                                                        {{$sub->namesize}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="submit" name="btn-submit"
                                                class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
</div>
<!-- end modal update product -->



@endforeach
</tbody>
</table>

<br>




</div>
</div>
</div>
</div>


@endsection