@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<form action="{{route('confirmDetail')}}" method="POST">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Đặt hàng tại quán</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class=" card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <h4>Chọn Sản phẩm</h4>
                        <select name="id_product" class="js-select2">
                            <?php foreach ($products as $i) { ?>
                            <option value="{{$i->id}}"
                                <?= isset($post['id_product']) && ($i->id == $post['id_product']) ? "selected" : '' ?>>
                                {{$i->namepro}}
                            </option>
                            <?php } ?>
                        </select>
                    </table>
                </div>
                <h4 class="mt-4">Thông tin khách hàng</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>Gmail khách hàng:</td>
                                <td><input type="text" name="gmail" value="<?= $post['gmail'] ?? '' ?>"><span
                                        style="color: red;">
                                        <?= $errors['gmail'] ?? '' ?></span></td>
                            </tr>
                            <tr>
                                <td>SĐT khách hàng:</td>
                                <td><input type="tel" name="phone" value="<?= $post['phone'] ?? '' ?>"><span
                                        style="color: red;">
                                        <?= $errors['phone'] ?? '' ?></span></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td><input type="text" name="address" value="<?= $post['address'] ?? '' ?>"><span
                                        style="color: red;">
                                        <?= $errors['address'] ?? '' ?></span></td>
                            </tr>
                            <tr>
                                <td>Ship:</td>
                                <td>
                                    <select name="id_ship">
                                        <?php foreach ($ship as $i) { ?>
                                        <option value="{{$i->id}}"
                                            <?= isset($post['id_product']) && ($i->id == $post['id_ship']) ? "selected" : '' ?>>
                                            {{$i->nameship}}
                                        </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- FIX BUG ship ============================================================================ -->
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-success" type="submit">Chuyển Tiếp</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
</form>
<script type="text/javascript">
$(document).ready(function() {
    $('.js-select2').select2();
});
</script>
<!-- End of Main Content -->
@endsection