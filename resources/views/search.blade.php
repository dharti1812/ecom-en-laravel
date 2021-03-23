@extends('master')
@section('content')
<div class="customproduct">
<div class="col-sm-4">
<a href="#">Filter</a>
</div>
<div class="col-sm-4">


 <div class="trending-wrapper">
  <h2>Result for products</h2>
  @foreach ($products as $product)
     <div class="search-item">
      <a href="detail/{{$product['id']}}">
      <img class="trending-img" src="{{$product['gallery']}}">
      <div class="">
        <h2>{{$product['name']}}</h2>
        <h5>{{$product['description']}}</h5>
      </div>
      </a>
    </div>

  @endforeach
   </div>
</div>
  </div>

@endsection