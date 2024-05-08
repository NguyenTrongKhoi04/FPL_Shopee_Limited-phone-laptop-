@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách lý do hủy đơn</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('addReasonReject')}}"><button class="btn btn-success mb-2">Thêm lý do hủy</button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên lý do</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên lý do</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($allReasonReject as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td>{{$i->name}}</td>
                            <td>
                                <a href="{{route('deleteReasonReject/'.$i->id)}}">
                                    <button onclick=" return confirm('Chắc chắn xác nhận xóa lý do')"
                                        class="btn btn-danger">Xóa lý do</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection