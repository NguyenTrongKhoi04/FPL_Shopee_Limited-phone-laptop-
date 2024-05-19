@extends('layout.main')
@section('content')
<div class="app__container container__giohang">
    <div class="grid">
        <div class="grid__row app__content">

            <div>
                <div class="d-flex mb-3">
                    <h1 style="font-size: 35px;" class="home-filter__giohang">Đơn hàng</h1>
                </div>
                <div class="mb-3">
                    <input type="radio" name="filter_option" value="0" checked>
                    <span class="me-2">Tất cả đơn</span>

                    <input type="radio" name="filter_option" value="1">
                    <span class="me-2">Đơn đã đặt</span>

                    <input type="radio" name="filter_option" value="2">
                    <span class="me-2">Đơn đang giao</span>

                    <input type="radio" name="filter_option" value="3">
                    <span class="me-2">Đơn hoàn thành</span>

                    <input type="radio" name="filter_option" value="4">
                    <span class="me-2">Đơn hủy</span>

                    <input type="radio" name="filter_option" value="5">
                    <span class="me-2">Đơn hoàn trả</span>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Sản phẩm mua</th>
                    <th>Thời gian đặt</th>
                    <th>Tên ship - Giá ship</th>
                    <th>Voucher</th>
                    <th>Thành tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>

                @foreach($listBill as $keyPro =>$pro)
                <tr data-set="{{$pro['status']}}">
                    <td>
                        {{$pro['id']}}
                        <input type="hidden" value="{{$pro['id']}}" name="id">
                        <input type="hidden" value="{{$pro['status']}}" name="status">
                    </td>
                    <td>
                        <?php foreach ($pro['arr_name_pro'] as $n) : ?>
                        <p>{{$n}}</p>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <p><?= date('H:i:s d/m/Y', strtotime($pro['time_order']))  ?></p>
                    </td>
                    <td>
                        <?php foreach ($listShip as $n) {
                            if ($n->id == $pro['id_ship']) { ?>
                        <P>{{$n->nameship}} - <span style="color: orangered;">{{$n->priceship}}$</span></P>
                        <?php }
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($listVoucher as $n) { ?>
                        <p>
                            <?php
                                $flag = '';
                                if ($n->id == $pro['id_voucher']) {
                                    echo $n->valuevoucher . '%';
                                    break;
                                } else {
                                    $flag = "Không Voucher";
                                }
                                ?></p>
                        <?php } ?>
                        <p><?= $flag ?></p>
                    </td>
                    <td>
                        <p><?= $pro['totalorder'] ?>$</p>
                    </td>
                    <td>
                        <?php foreach ($listStatusOrder as $n) {
                            if ($n->id == $pro['status']) { ?>
                        <P>{{$n->name}} </P>
                        <?php }
                        } ?>
                        <?php if ($pro['status'] == 3) {
                            $estimated_time_complete = date('H:i:s d/m/Y', strtotime($pro['time_complete']) + strtotime($pro['timeship']))  ?>
                        <p style="color: red;">(Dự tính thời gian hoàn thành: <?= $estimated_time_complete ?> )</p>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="{{route('detailBill/'.$pro['id'])}}"><button class="btn btn-primary">Xem chi tiết
                            </button></a>
                        @if(!empty($pro['detail_view'])):
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-{{$pro['detail_view']['class']}} open-modal">{{$pro['detail_view']['text']}}</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            <form action="{{route('updateStatus')}}" method="POST">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Chọn lý do</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="modalInputID">
                                <input type="hidden" name="status" id="modalInputStatus">
                                <?php foreach ($listReasonReject as $n) { ?>
                                <input type="radio" name="reason_reject" value="{{$n->id}}" checked>
                                <label for="">{{$n->name}}</label>
                                <br>
                                <?php } ?>
                                <textarea name="reason_text" id="" cols="92" rows="4" class="reason_text mt-2"
                                    placeholder="Nhập lý do"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Trở lại
                                </button>
                                <button type="submit" class="btn btn-primary">Xác nhận hủy đơn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- <div class="home-filter__buyall" id="formmua" style="background-color: var(--white-color);">
                <div class="home-filter__buyall-control">
                    <div class="home-card-item-delete">
                        <div class="home-card__muangay">
                            <button name="xoamucdachon" type="submit" class="btn home-card__btn-muangay">Xóa mục đã
                                chọn</button>
                        </div>
                    </div>
                    <div class="home-card-item-delete">
                        <div class="home-card__muangay">
                            <button name="muamucdachon" onclick="checkAccount()" type="submit"
                                class="btn btn--primary home-card__btn-muangay">Mua mục đã chọn</button>
                        </div>
                    </div>
                </div>
                <form action="" class="" style="background-color: var(--white-color); ">
                    <span class="home-filter__buyall-tongtien-text">Tổng tiền : </span>
                    <input class="home-filter__buyall-tongtien" style="width: 150px;" type="text" name="totalPrice"
                        value="0" readonly id="totalPrice">
                    <button onclick="checkAccount()" type="button" class="btn home-filter__btn-buyall btn--primary">Mua
                        tất cả</button>
                </form>
            </div> -->
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const buttons = document.querySelectorAll('.open-modal');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const tr = this.closest('tr');
            const hiddenInputStatus = tr.querySelector('input[name="status"]').value;
            const hiddenInputID = tr.querySelector('input[name="id"]').value;

            document.getElementById('modalInputStatus').value = hiddenInputStatus;
            document.getElementById('modalInputID').value = hiddenInputID;
            let display = (hiddenInputStatus == 4) ? "block" : "none";
            let disabled = hiddenInputStatus == 4 ? false : true;
            document.querySelector('.reason_text').style.display = display;
            document.querySelector('.reason_text').disabled = disabled;
        });
    });

    // TODO Lọc theo radio
    const radioButtons = document.querySelectorAll('input[name="filter_option"]');
    const rows = document.querySelectorAll('tr[data-set]');
    const filterMap = {
        '0': () => true, // all
        '1': (rowValue) => rowValue == '1' || rowValue == '2' || rowValue == '5', // đặt + chờ xác nhận
        '2': (rowValue) => rowValue == '3', // đang giao
        '3': (rowValue) => rowValue == '4', // hoàn thành
        '4': (rowValue) => rowValue == '6' || rowValue == '9', // đơn hủy
        '5': (rowValue) => rowValue == '7' || rowValue == '8', // đơn hoàn trả
    };
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            const selectedValue = this.value;
            rows.forEach(row => {
                const rowValue = row.getAttribute('data-set');
                row.style.display = filterMap[selectedValue](rowValue) ? '' : 'none';
            });
        });
    });
});
</script>
@endsection