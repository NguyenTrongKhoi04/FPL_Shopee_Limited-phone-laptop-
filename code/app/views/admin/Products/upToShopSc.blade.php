@extends('layout.main')
@section('content')
@if(isset($check))

<script>
    alert('{{$check}}')
</script>


@endif
<div class="container">
    <!-- <h1 class="h3 mb-4 text-gray-800">Các sản phẩm của {{$sub->name_subcate}}</h1> -->
    <h1 class="h3 mb-4 text-gray-800">Các sản phẩm </h1>

    <!-- <select id="select2" onchange="changeProduct()" name="tinh-thanh[]" class="js-select2" multiple="multiple">
    @foreach($oneproduct as $one)
    @php
    $optionValue = $one->id . '|' . $one->name_pro . '|' . $one->quantity . '|' . $one->datepro . '|' . $one->id_subcategory . '|' . $one->description;
    @endphp
    <option value="{{ $optionValue }}">
        {{ $one->id }} | {{ $one->name_pro }} | {{ $one->quantity }} | {{ $one->datepro }} | {{ $one->id_subcategory }} | {{ $one->description }}
    </option>

    @endforeach
</select>
<br><br>





<form id="myForm" method="post" action="{{route('doneUpToShop')}}">
    @csrf
    <textarea class="form-control" name="selectedProducts" id="selectedProducts" cols="30" readonly rows="10"></textarea>
    <input type="hidden" id="arrayOfArrays" name="arrayOfArrays">
    <button type="submit" name="btn-submit">Submit</button>
</form>

<script>
    $(document).ready(function() {
        $('.js-select2').select2();
    });

    function changeProduct() {
        var selectedValues = $('#select2').val();
        var arrayOfObjects = [];

        selectedValues.forEach(function(value) {
            var parts = value.split('|');
            var id = parts[0];
            var name_pro = parts[1];
            var quantity = parts[2];
            var datepro = parts[3];
            var id_subcategory = parts[4];
            var description = parts[5];

            var dataObject = {
                id: id,
                name_pro: name_pro,
                quantity: quantity,
                datepro: datepro,
                id_subcategory: id_subcategory,
                description: description
            };

            arrayOfObjects.push(dataObject);
        });

        $('#arrayOfArrays').val(JSON.stringify(arrayOfObjects));

        var selectedDataList = '';
        arrayOfObjects.forEach(function(obj) {
            selectedDataList += obj.id + ' | ' + obj.name_pro + ' | ' + obj.quantity + ' | ' + obj.datepro + ' | ' + obj.id_subcategory + ' | ' + obj.description + '\n';
        });

        $('#selectedProducts').val(selectedDataList);
    }
</script> -->


    <select id="productSelect" class="form-control">
        <option value="">Chọn sản phẩm up lên sàn</option>
        @foreach($oneproduct as $one)
        @php
        $optionValue = $one->id . '|' . $one->name_pro . '|' . $one->quantity . '|' . $one->datepro . '|' . $one->id_subcategory . '|' . $one->description;
        @endphp
        <option value="{{ $optionValue }}">
            {{ $one->id }} | {{ $one->name_pro }} | {{ $one->quantity }} | {{ $one->datepro }} | {{ $one->id_subcategory }}
        </option>
        @endforeach
    </select>


    <br><br>

    <select id="secondSelect" class="form-control" disabled>
        <option value="">Chọn các biến thể</option>
        @foreach($alldetail as $all)
        <!-- @foreach($oneproduct as $one)
        @if($all->id_pro == $one->id) -->
        <option value="{{$all->id}} {{$all->id_pro}} {{$all->price}} {{$all->image}} {{$all->size}} {{$all->count}}">{{$all->id}}|{{$all->price}}$|{{$all->size}}|{{$all->count}}</option>
        <!-- @endif
        @endforeach -->
        @endforeach
    </select>
    <br><br>

    <form action="{{route('submitUp')}}" method="post" class="form">
        <div class="<div class=" card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>ID Pro</th>
                                <th>ID Detail</th>
                                <th>Name pro</th>
                                <th>giá </th>
                                <th>ảnh </th>
                                <th>size</th>
                                <th>số lượng</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Pro</th>
                                <th>ID Detail</th>
                                <th>Name pro</th>
                                <th>giá </th>
                                <th>ảnh </th>
                                <th>size</th>
                                <th>số lượng</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <tr>

                                <!-- <td><input type="hidden" name="id_pro[]" value=""></td>
                                <td><input type="hidden" name="id_detail[]" value=""></td>
                                <td><input type="hidden" name="name_pro[]" value=""></td>
                                <td><input type="hidden" name="price[]" value=""></td>
                                <td><input type="hidden" name="image[]" value=""></td>
                                <td><input type="hidden" name="size[]" value=""></td>
                                <td><input type="text" name="quantity[]" value=""></td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div id="inputContainer" class="from-control"></div> <br>
        <input type="hidden" name="selectedData" id="selectedData"> -->
        <button type="submit" name="btn-submit" class="btn btn-success ">Submit</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productSelect = document.getElementById('productSelect');
            var secondSelect = document.getElementById('secondSelect');
            var selectedOptions = []; // Mảng lưu trữ các option đã được chọn
            window.selectedName2;
            window.id;

            productSelect.addEventListener('change', function() {
                var selectedId = this.value.split('|')[0]; // Lấy $one->id từ select thứ nhất
                var selectedName = this.value.split('|')[1]; // Lấy $one->name từ select thứ nhất
                window.id = this.value.split('|')[0];
                window.selectedName2 = selectedName;
                console.log(selectedName);
                var options = secondSelect.querySelectorAll('option');

                if (selectedId) {

                    secondSelect.removeAttribute('disabled'); // Kích hoạt select thứ hai
                } else {
                    secondSelect.disabled = true; // Vô hiệu hóa select thứ hai
                    return;
                }

                options.forEach(function(option) {
                    var idPro = option.value.split(' ')[1]; // Lấy $all->id_pro từ select thứ hai

                    if (idPro === selectedId) {
                        option.style.display = 'block';
                    } else {
                        option.style.display = 'none';
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var productSelect = document.getElementById('productSelect');
            var secondSelect = document.getElementById('secondSelect');
            var tableBody = document.querySelector('#dataTable tbody');

            secondSelect.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var selectedValues = selectedOption.value.split(' ');
                if (selectedOption) {
                    selectedOption.style.display = 'none'; // Ẩn option đã chọn
                    this.selectedIndex = -1; // Reset select box
                }

                // Tạo một hàng mới trong bảng
                var newRow = tableBody.insertRow();

                // Thêm các ô dữ liệu vào hàng mới
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);
                var cell5 = newRow.insertCell(4);
                var cell6 = newRow.insertCell(5);
                var cell7 = newRow.insertCell(6);

                // var selectedName = this.value.split('|')[1]; // Lấy $one->name từ select thứ nhất
console.log(window.id);
                // Gán giá trị cho các ô dữ liệu từ dữ liệu của option đã chọn
                cell1.innerHTML = selectedValues[1]; // ID Pro
                var inputIdPro = document.createElement('input');
                inputIdPro.setAttribute('type', 'hidden');
                inputIdPro.setAttribute('name', 'id_pro[]');
                inputIdPro.setAttribute('value', window.id);
                cell1.appendChild(inputIdPro);
                cell2.innerHTML = selectedValues[0]; // ID Detail
                var inputIdDetail = document.createElement('input');
                inputIdDetail.setAttribute('type', 'hidden');
                inputIdDetail.setAttribute('name', 'id_detail[]');
                inputIdDetail.setAttribute('value', selectedValues[0]);
                cell2.appendChild(inputIdDetail);
                cell3.innerHTML = window.selectedName2; // Name pro
                var inputPrice = document.createElement('input');
                inputPrice.setAttribute('type', 'number');
                inputPrice.setAttribute('name', 'price[]'); // Đặt tên cho input quantity
                inputPrice.setAttribute('value', selectedValues[2]);
                cell4.appendChild(inputPrice); // Giá
                var img = document.createElement('img');
                img.src = selectedValues[3];
                img.width = 80;
                cell5.appendChild(img);
                var inputImage = document.createElement('input');
                inputImage.setAttribute('type', 'hidden');
                inputImage.setAttribute('name', 'image[]'); // Đặt tên cho input quantity
                inputImage.setAttribute('value', selectedValues[3]);
                cell5.appendChild(inputImage); // Giá
                cell6.innerHTML = selectedValues[4]; // Size
                var inputSize = document.createElement('input');
                inputSize.setAttribute('type', 'hidden');
                inputSize.setAttribute('name', 'size[]');
                inputSize.setAttribute('value', selectedValues[4]);
                cell6.appendChild(inputSize);
                var inputQuantity = document.createElement('input');
                inputQuantity.setAttribute('type', 'number');
                inputQuantity.setAttribute('name', 'quantity[]'); // Đặt tên cho input quantity
                inputQuantity.setAttribute('value', selectedValues[5]);
                cell7.appendChild(inputQuantity); // Số lượng

            });
        });
    </script>

    @endsection