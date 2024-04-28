@extends('layout.main')
@section('content')

<!-- <h1 class="h3 mb-4 text-gray-800">Các sản phẩm của {{$sub->name_subcate}}</h1> -->
<h1 class="h3 mb-4 text-gray-800">Các sản phẩm </h1>

@foreach($oneproduct as $one)
@foreach($subcate as $sub)
@if($sub->id == $one->id_subcategory)
@endif
@endforeach
@endforeach

<form action="{{route('addUpToShop')}}" method="post">
<select name="tinh-thanh[]" class="js-select2" multiple="multiple">
@foreach($oneproduct as $one)
    <option value="{{$one->id}}">
        <td style="background-color: blue;"><b>{{$one->name_pro}}</b></td> |
        <td style="background-color: blue;">{{$one->quantity}}</td> |
        <td style="background-color: blue;">{{$one->datepro}}</td> |
        <td style="background-color: blue;">{{$one->id_subcategory}}</td> |
        <td style="background-color: blue; width: 100px;">{{$one->description}}</td>
    </option>
@endforeach

</select>
<button type="submit" name="btn-submit" class="btn btn-success mt-3 ">Up</button>

</form>





<script type="text/javascript">
    $(document).ready(function() {
        $('.js-select2').select2();
    });
</script>



@endsection