@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách Sale</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('addSale')}}"><button class="btn btn-success mb-2">Thêm sale</button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên mã sale</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Thời gian sale</th>
                            <th>Giảm giá</th>
                            <th>Tổng sản phẩm sale</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên mã sale</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Thời gian sale</th>
                            <th>Giảm giá</th>
                            <th>Tổng sản phẩm sale</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($allSale as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td>{{$i->namesale}}</td>
                            <td><?= date('d/m/Y', strtotime($i->datesale)) ?></td>
                            <td><?= date('d/m/Y', strtotime($i->timesale)) ?></td>
                            <td><?= date_diff(date_create($i->timesale), date_create($i->datesale))->format('%a') ?>
                                days
                            </td>
                            <td style="color: orange;">{{$i->valuesale}}%</td>
                            <td>
                                <?php
                                $count = 0;
                                foreach($allSalePro as $n){
                                     if($i->id == $n->sale ){$count++;} 
                                }
                                echo $count;
                                ?>
                            </td>
                            <td> <a href="{{route('deleteSale/'.$i->id)}}">
                                    <button onclick=" return confirm('Chắc chắn xác nhận xóa')"
                                        class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>
                        @endforeach
                        <script>
                        // Get current datetime
                        const now = new Date();
                        // Format current datetime to be compatible with datetime-local input
                        const dataTimeLocalNow = now.toISOString().slice(0, 16);

                        // Set min attribute of datetime-local input to current datetime
                        document.getElementById('datetime').setAttribute('min', dataTimeLocalNow);
                        </script>
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