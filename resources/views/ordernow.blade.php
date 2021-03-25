@extends('master')
@section('content')
<div class="customproduct">

<div class="col-sm-10">

 <table class="table">
    
    <tbody>
      <tr>
        <td>Amount</td>
        <td>$ {{$total}}</td>
    
      </tr>
      <tr>
        <td>Tax</td>
        <td>$ 0</td>
  
      </tr>
      <tr>
        <td>Delievery Charge</td>
        <td>$ 10</td>
     
      </tr>
        <tr>
        <td>Total Amount</td>
        <td>$ {{$total + 10}} </td>
       
      </tr>
    </tbody>
  </table>
  <form action="/orderplace" method="post">
  @csrf
  <div class="form-group">
    <textarea type="text" class="form-control" placeholder="Enter Your Address" name="address"></textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Payment Method:</label><br>
    <input type="radio" name="payment" value="cash" > <span>Online Payment</span><br>
     <input type="radio" name="payment" value="cash"> <span>EMI Payment</span><br>
      <input type="radio" name="payment" value="cash"> <span>Cash on Delievery</span><br>
  </div>
 
  <button type="submit" class="btn btn-default">Order Now</button>
</form>
</div>
  </div>

@endsection