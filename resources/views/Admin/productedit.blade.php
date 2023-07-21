@extends('Admin.dashbord')
@section('content')
<h1>Product </h1>
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form method="POST" action="{{route('product.update',$product->pid)}}">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="email">Product Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="pname" require value="{{$product->productname ?? ''}}">
    </div>
    <div class="form-group">
      <label for="email">Product price:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="price" require value="{{$product->price ?? ''}}">
    </div>
    <div class="form-group">
      <label for="email">Product qty:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="qty" require value="{{$product->qty ?? ''}}">
    </div>
    
    <input type="submit" value="submit" name="submit" class="btn btn-primary">
  </form>
</div>

@endsection