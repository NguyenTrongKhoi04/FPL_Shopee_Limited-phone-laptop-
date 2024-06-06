@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách Sale</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('addShip')}}"><button class="btn btn-success mb-2">Thêm ship</button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên ship</th>
                            <th>Thời gian ship</th>
                            <th>Giá ship</th>
                            <th>Trạng thái ship</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên ship</th>
                            <th>Thời gian ship</th>
                            <th>Giá ship</th>
                            <th>Trạng thái ship</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($allShip as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td>{{$i->nameship}}</td>
                            <td style="color: orangered;">
                                <?php
                                $days = floor($i->timeship / (24 * 60)); // Số ngày
                                $remaining_minutes = $i->timeship % (24 * 60); // Số phút còn lại sau khi loại bỏ số ngày

                                $hours = floor($remaining_minutes / 60); // Số giờ
                                $remaining_minutes %= 60; // Số phút còn lại sau khi loại bỏ số giờ

                                $result = '';

                                if ($days > 0) {
                                    $result .= $days . 'd ';
                                }
                                if ($hours > 0) {
                                    $result .= $hours . 'h ';
                                }
                                if ($remaining_minutes > 0) {
                                    $result .= $remaining_minutes . 'p';
                                }

                                echo $result;
                                ?></td>
                            <td>{{$i->priceship}}$</td>
                            <td>
                                <?php if ($i->statusship == 0) : ?>
                                <span style="color: #28a745;">Đang hoạt động</span>
                                <?php else : ?>
                                <span style="color: #dc3545;">ngừng hoạt động</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($i->statusship == 0) : ?>
                                <a href="{{route('stopShip/'.$i->id)}}">
                                    <button onclick=" return confirm('Chắc chắn xác nhận tạm dừng')"
                                        class="btn btn-secondary">Tạm dừng</button></a>
                                <?php else : ?>
                                <a href="{{route('continueShip/'.$i->id)}}">
                                    <button onclick=" return confirm('Chắc chắn xác nhận khôi phục hoạt động')"
                                        class="btn btn-secondary">Tiếp tục hoạt động</button></a>
                                <?php endif ?>
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