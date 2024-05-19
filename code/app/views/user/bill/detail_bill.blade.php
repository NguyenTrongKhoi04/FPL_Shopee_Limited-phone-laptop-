@extends('layout.main')
@section('content')
<div class="app__container container__giohang">
    <div class="grid">
        <div class="grid__row app__content">

            <div>
                <div class="d-flex mb-3">
                    <h1 style="font-size: 35px;" class="home-filter__giohang">Chi tiết đơn hàng</h1>
                </div>
                <div class="mb-3">
                    <a href="{{route('listbill')}}"><button class="btn btn-primary">Xem tất cả đơn hàng</button></a>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>Tên Sản phẩm</th>
                    <th>Size</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Địa chỉ nhận hàng</th>
                    <th>Số điện thoại nhận hàng</th>
                    <th>Ghi chú đơn hàng</th>
                    <th>Tổng giá</th>
                </tr>

                @foreach($listDetail as $keyPro =>$pro)
                <tr>
                    <td>{{$pro->namepro}}</td>
                    <td>
                        <?php foreach ($listShip as $n) {
                            if ($n->id == $pro->size) { ?>
                        <P>{{$n->namesize}} </P>
                        <?php }
                        } ?>
                    </td>
                    <td>
                        <img src="<?= $pro->image ?>" alt="" width="100px" height="80px">
                    </td>
                    <td>
                        {{$pro->address}}
                    </td>
                    <td>
                        {{$pro->phone}}
                    </td>
                    <td>
                        {{$pro->comment}}
                    </td>
                    <td>
                        {{$pro->count * $pro->price}}
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