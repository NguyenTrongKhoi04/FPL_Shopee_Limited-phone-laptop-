@extends('layout.main')
@section('content')
@if(isset($check))

<script>
    alert('{{$check}}')
</script>


@endif
@if(isset($error))
<!-- @foreach($error as $er) -->
<script>
    alert('{{$error[1]}}');
</script>
<!-- @endforeach -->
@endif
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tất cả sản phẩm trong kho: </h1>
    <div class="float-end mb-3">
        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm mới sản phẩm</button>
        <button data-bs-toggle="collapse" class=" btn btn-success " data-bs-target="#demo">Danh Mục</button>
    </div>
    <div id="demo" class="collapse mb-3" style="margin-top: 80px; margin-left: 900px;">
        <button type="button" class="btn btn-info " data-bs-toggle="modal" data-bs-target="#danhsachdanhmuc">Danh sách danh mục</button>
        <button type="button" class="btn btn-info " data-bs-toggle="modal" data-bs-target="#exampleModal2">Thêm mới danh mục</button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-xxl-5" id="exampleModalLabel">Thêm mới sản phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add-storeProduct')}}" method="post" name="addForm">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name_pro" class="form-control" id="" value="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Số lượng còn lại</label>
                            <input type="number" name="quantity" class="form-control" id="" value="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Loại sản phẩm</label>
                            <select class="rounded " name="id_subcategory" id="">
                                @foreach($subcategory as $sub)
                                <option class="rounded " value="{{$sub->id}}">{{$sub->name_subcate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
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
    <!-- modal 2 -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-xxl-5" id="exampleModalLabel">Thêm mới danh mục</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add-subcategory')}}" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                            <input type="text" name="name_subcate" class="form-control" id="" value="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Loại sản phẩm</label>
                            <select class="rounded " name="id_category" id="">
                                @foreach($cate as $ca)
                                <option class="rounded " value="{{$ca->id}}">{{$ca->name_cate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" name="btn-submitadd" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- danh sach danh muc -->
    <div class="modal fade" id="danhsachdanhmuc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-xxl-5" id="exampleModalLabel">Danh sách danh mục</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Danh Mục</th>
                                <th scope="col">Loại</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategory as $sub)
                            <tr>
                                <td>{{$sub->id}}</td>
                                <td>{{$sub->name_subcate}}</td>
                                @foreach($cate as $ca)
                                @if($ca->id == $sub->id_category)
                                <td>{{$ca->name_cate}}</td>
                                @endif
                                @endforeach
                                <td><a href="{{route('detailSubcate/'.$sub->id)}}"><button type="button" class="btn btn-warning" >Update</button></a> | <a onclick="confirm('bạn có chắc xóa danh mục này')" href="{{route('deleteSubcate/'.$sub->id)}}"><button class="btn btn-danger">Delete</button></a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end2 modal -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Date Import</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)

            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name_pro}}</td>
                <td>{{$p->quantity}}</td>
                <td style="">{{$p->datepro}}</td>
                <td style="width: 500px;text-overflow: ellipsis;">{{$p->description}}</td>
                <td>
                    <a href="{{route('seeDetail/'.$p->id)}}"> <button class="btn btn-success " style="font-size: 10px;" >
                        See details
                    </button> </a> <br>
                    <button class="btn btn-warning" style="font-size: 10px;" data-bs-toggle="modal" data-bs-target="#updateProduct{{$p->id}}">
                        Update
                    </button> <br>
                    <a href="{{route('deleteStoreProduct/'.$p->id)}}"> <button onclick="confirm('bạn có chắc muốn xóa')" class="btn btn-danger " style="font-size: 10px;""> 
                        Delete
                    </button>
                    </a>
                </td>
            </tr>
            <!-- modal update product -->
            <div class=" modal fade" id="updateProduct{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Edit</b> {{$p->name_pro}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('edit-storeProduct/'.$p->id)}}" method="post">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                                                <input type="text" name="name_pro" class="form-control" id="" value="{{$p->name_pro}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Số lượng còn lại</label>
                                                <input type="number" name="quantity" class="form-control" id="" value="{{$p->quantity}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Loại sản phẩm</label>
                                                <select class="rounded " name="id_subcategory" id="">
                                                    @foreach($subcategory as $sub)
                                                    <option class="rounded " value="{{$sub->id}}" <?= ($sub->id == $p->id_subcategory) ? 'selected' : ""  ?>>{{$sub->name_subcate}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                                                <textarea name="description" id="" cols="30" rows="10">{{$p->description}}</textarea>
                                            </div>
                                            <button type="submit" name="btn-submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

<!-- End of Main Content -->
@endsection