@extends('layout.main')
@section('content')
@if(isset($check))

<script>
    alert('{{$check}}')
</script>


@endif
<!-- <h1 class="h3 mb-4 text-gray-800">Các sản phẩm của {{$sub->name_subcate}}</h1> -->
<h1 class="h3 mb-4 text-gray-800">Các sản phẩm </h1>

@foreach($oneproduct as $one)
@foreach($subcate as $sub)
@if($sub->id == $one->id_subcategory)
@endif
@endforeach
@endforeach

<select id="select2" onchange="changeProduct()" name="tinh-thanh[]" class="js-select2" multiple="multiple">
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
</script>



@endsection