@extends('layout.main')
@section('content')
<div class="main-content">
    <div class="card-body container ">
        <h4 class="card-title text-center h1 my-5">Thông tin đặt hàng</h4>
        <div class="comtainer row">
            <div class="col-6">
                <h5>Sản phẩm đã chọn</h5>
                <form action="" method="post">
                <table class="table">
                    @foreach($product as $keyPro =>$pro)
                    <tr>
                        <td> <img src="{{$pro->image}}" alt="" width="50px"> </td>
                        <td>
                            <p>{{$pro->namepro}}</p>
                        </td>
                        <td>
                            <p>{{$pro->name_subcate}}</p>
                        </td>
                        <td>
                            <p>{{$pro->namesize}}</p>
                        </td>
                        <td>
                            <p>{{ $pro->price - ($pro->price * $pro->valuesale / 100) }}vnđ</p>
                        </td>
                        <td>
                            @php
                            echo "<input type='number' name='quantity[]' value='{$trueQuantity[$keyPro]}'>";
                            echo "<input type='hidden' name='idprone' >";
                            @endphp
                        </td>
                    </tr>
                    <td>
                        Lời nhắn:
                        <input class="form-control " type="text" name="note[]" id=""">
                    </td>
                    @endforeach
                </table>
                    <div class="form-group my-3">
                        Sử dụng voucher:
                        <input class="form-control w-50 " type="text" name="voucher" id=""> <br>
                    </div>
                    @if(isset($voucher))
                    <p style="color: red;">áp dụng thành công, voucher giảm <?= $voucher ?>%</p>
                    <h1 style=" border-radius: 10px; text-align: center;" disabled> Tổng tiền: <?= $totalPrice - ($totalPrice * $voucher / 100) ?>vnđ</h1> <br>
                    <input type="hidden" name="totalPrice" value="<?= $totalPrice - ($totalPrice * $voucher / 100) ?>"> <br>
                    <input type="hidden" name="voucher" value="<?= $id_voucher?>"> <br>
                    @else
                    @if(isset($text))
                    <p style="color: red;">{{$text}}</p>
                    @endif
                    <h1 style=" border-radius: 10px; text-align: center;" disabled> Tổng tiền: {{$totalPrice}}</h1>
                    <input type="hidden" name="totalPrice" value="{{$totalPrice}}"> <br>
                    @endif

                    <br> <br> <br>

            </div>
            <div class="col-6">
                <h5>Thông tin nhận hàng</h5>
                <div class="row d-flex align-items-center ">
                    <div class="col-md-6 ">
                        <div class="form-group my-3 ">
                            Email:
                            <span class="form-control">
                                {{$account[0]->gmail}}
                            </span>
                        </div>
                        <div class="form-group my-3">
                            Ho Tên :
                            <span class="form-control">
                                {{$account[0]->username}}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group my-3">
                            Địa chỉ:
                            <input type="text" name="address"  class="form-control" value="{{$account[0]->address}}" >
                        </div>
                        <div class="form-group my-3">
                            Số điện thoại:
                               <input type="text" name="phone" class="form-control" value=" {{$account[0]->phone}}" >
                        </div>

                    </div>
                    <div>
                        <label for="">Hãng ship</label>
                        <select name="ship" id="">
                            @foreach($ship as $s)
                            <option value="{{$s->id}}">{{$s->nameship}} - nhận hàng trong{{$s->timeship}}ngày - ({{$s->priceship}})vnđ</option>
                            @endforeach
                        </select>
                    </div>
                    <br> <br> <br>
                    <button type="submit" name="dathang" class="btn btn-success ">Đặt hàng</button>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection