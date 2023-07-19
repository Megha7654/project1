@extends('Admin.dashbord')
@section('content')
<h1>Product </h1>
<div class="container">
  
  <form method="POST" action="{{route('product.store')}}">
    @csrf
    <div class="form-group">
      <label for="email">Product Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="pname" require>
    </div>
    <div class="form-group">
      <label for="email">Product price:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="price" require>
    </div>
    <div class="form-group">
      <label for="email">Product qty:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="qty" require>
    </div>
    
    <input type="submit" value="submit" name="submit" class="btn btn-primary">
  </form>
</div>

@endsection