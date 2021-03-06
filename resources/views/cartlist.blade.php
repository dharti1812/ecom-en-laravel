@extends('master')
@section('content')
<div class="customproduct">

<div class="col-sm-10">


 <div class="trending-wrapper">
  <h2>Result for products</h2>
  <a class="btn btn-success" href="ordernow">Order Now</a><br>
  @foreach ($products as $product)
     <div class=" row search-item cart-list-divider">
     <div class="col-sm-3">
      <a href="detail/{{$product->id}}">
      <img class="trending-img" src="{{$product->gallery}}">
     
      </a>
     </div>
       <div class="col-sm-4">
     
      <div class="">
        <h2>{{$product->name}}</h2>
        <h5>{{$product->description}}</h5>
      </div>
     
     </div>
       <div class="col-sm-3">
     
      <div class="">
      <a href="/removecart/{{$product->cart_id}}" class="btn btn-warning">Remove From Cart</a>
      </div>
     
     </div>
    </div>

  @endforeach
   </div>
     <a class="btn btn-success" href="ordernow">Order Now</a><br>
</div>
  </div>

@endsection