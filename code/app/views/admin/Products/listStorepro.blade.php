@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tất cả sản phẩm trong kho: </h1>
    <p class="d-inline-flex gap-1">
@foreach($subcategory as $sub)
<button class="btn btn-primary" style="position: relative;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$sub->id}}" aria-expanded="false" aria-controls="collapseExample">
    {{$sub->name_subcate}} 
 </button> 

<div class="collapse" id="collapseExample{{$sub->id}}">
  <div class="card card-body">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Date Import</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $p)
  @if($p->id_subcategory == $sub->id)
  
  <tr>
      <td>{{$p->id}}</td>
      <td>{{$p->name_pro}}</td>
      <td>{{$p->quantity}}</td>
      <td style="">{{$p->datepro}}</td>
      <td style="width: 500px;text-overflow: ellipsis;">{{$p->description}}</td>
    <td>    
    <button class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$p->id}}">
        xem tất cả    
    </button>
    </td>
    </tr>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$p->name_pro}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

@foreach($storedetaiproduct as $de)
  @if($de->id == $p->id)
<div class="bg-dark p-2 rounded ">
    {{$de->id}}
  <img src="{{$de->image}}" alt="" class="w-25 rounded ">
  {{$de->price}}
  @foreach($size as $si)
  @if($si->id == $de->size)
  {{$si->namesize}}
  @endif
  @endforeach   
  {{$de->count}}
</div>
<br>
@endif
  @endforeach     



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
  <!-- endmodal -->
    @endif
  @endforeach
  </tbody>
</table>
  <!-- {{$sub->name_subcate}} :

   <br>
   <br>
 -->
  <br>
</div>
</div>
@endforeach


</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection