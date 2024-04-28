@extends('layout.main')
@section('content')


@foreach($subcate as $sub)
@foreach($oneproduct as $one)
@if($sub->id == $one->id_subcategory)
<h1 class="h3 mb-4 text-gray-800">Các sản phẩm của {{$sub->name_subcate}}</h1>
@endif
@endforeach
@endforeach

<form action="" method="post">
<select name="tinh-thanh[]" class="js-select2" multiple="multiple">
@foreach($oneproduct as $one)
<a href="{{route('addUpToShop/'.$one->id)}}">
    <option value="{{$one->id}}">
        <td style="background-color: blue;"><b>{{$one->name_pro}}</b></td> |
        <td style="background-color: blue;">{{$one->quantity}}</td> |
        <td style="background-color: blue;">{{$one->datepro}}</td> |
        <td style="background-color: blue;">{{$one->id_subcategory}}</td> |
        <td style="background-color: blue; width: 100px;">{{$one->description}}</td>
    </option>
</a>
@endforeach

</select>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-select2').select2();
    });
</script>
</form>









@endsection